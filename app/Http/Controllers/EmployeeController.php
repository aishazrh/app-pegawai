<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = Employee::with(['department', 'position', 'salary'])
            ->when($search, function ($query, $search) {
                $query->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nomor_telepon', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->oldest()
            ->get();

        return view('employees.index', compact('employees', 'search'));
    }

    public function create()
    {
        $employees = Employee::all();
        $departments = Department::all();
        $positions = Position::all();

        return view('employees.create', compact('employees', 'departments', 'positions'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'nomor_telepon'  => 'required|string|max:20',
            'tanggal_lahir'  => 'required|date',
            'alamat'         => 'required|string|max:255',
            'tanggal_masuk'  => 'required|date',
            'status'         => 'required|string|max:255',
            'department_id'  => 'required|exists:departments,id',
            'jabatan_id'     => 'required|exists:positions,id',
        ]);

        // dd(vars: $validated);

        Employee::create($validated);

        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
        $employee = Employee::with(['department', 'position'])->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|string|max:50',
            'department_id' => 'required|exists:departments,id',
            'jabatan_id'    => 'required|exists:positions,id'
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
            'department_id',
            'jabatan_id'
        ]));

        return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }

    public function getEmployee($id)
    {
        $employee = Employee::with(['department', 'position'])->find($id);
        return response()->json([
            'nama_lengkap' => $employee->nama_lengkap,
            'department_id' => $employee->department_id,
            'jabatan_id' => $employee->jabatan_id
        ]);
    }
}
