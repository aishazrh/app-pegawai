<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $attendances = Attendance::with('employee')
            ->when($search, function ($query, $search) {
                $query->whereHas('employee', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%");
                })
                    ->orWhere('tanggal', 'like', "%{$search}%")
                    ->orWhere('status_absensi', 'like', "%{$search}%");
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(10);

        return view('attendance.index', compact('attendances', 'search'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|string|max:50',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);

        $attendance->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
            'status_absensi' => $request->status_absensi,
        ]);

        return redirect()->route('attendance.index')->with('success', 'Data kehadiran berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();

        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}
