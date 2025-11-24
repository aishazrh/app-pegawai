<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as Pengajuan;
use App\Models\Employee;

class RequestController extends Controller
{
    // Tampilkan semua pengajuan
    public function index()
    {
        $requests = Pengajuan::with('karyawan')->get();
        return view('requests.index', compact('requests'));
    }

    // Form buat pengajuan baru
    public function create()
    {
        $employees = Employee::with(['department', 'position'])->get();
        return view('requests.create', compact('employees'));
    }

    // Simpan pengajuan baru
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tipe_pengajuan' => 'required|in:sakit,izin,cuti,peningkatan gaji,pengunduran diri',
            'tanggal_pengajuan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $employee = Employee::find($request->karyawan_id);
        $dokumenPath = $request->file('dokumen') ? $request->file('dokumen')->store('dokumen_requests') : null;

        Pengajuan::create([
            'karyawan_id' => $request->karyawan_id,
            'nama_karyawan' => $employee->nama_lengkap,
            'departemen' => $employee->department->nama_departemen,
            'jabatan' => $employee->position->nama_jabatan,
            'tipe_pengajuan' => $request->tipe_pengajuan,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'dokumen' => $dokumenPath,
        ]);

        return redirect()->route('requests.index')->with('success', 'Pengajuan berhasil dibuat!');
    }

    // Tampilkan detail pengajuan
    public function show($id)
    {
        $requestItem = Pengajuan::with('karyawan')->findOrFail($id);
        return view('requests.show', compact('requestItem'));
    }

    // Form edit pengajuan
    public function edit($id)
    {
        $requestItem = Pengajuan::findOrFail($id);
        $employees = Employee::all();
        return view('requests.edit', compact('requestItem', 'employees'));
    }

    // Update pengajuan
    public function update(Request $request, $id)
    {
        $requestItem = Pengajuan::findOrFail($id);

        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tipe_pengajuan' => 'required|in:sakit,izin,cuti,peningkatan gaji,pengunduran diri',
            'tanggal_pengajuan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $employee = Employee::find($request->karyawan_id);

        // Jika upload dokumen baru, replace yang lama
        if ($request->hasFile('dokumen')) {
            $dokumenPath = $request->file('dokumen')->store('dokumen_requests');
        } else {
            $dokumenPath = $requestItem->dokumen; // tetap pakai dokumen lama
        }

        $requestItem->update([
            'karyawan_id' => $request->karyawan_id,
            'nama_karyawan' => $employee->nama_lengkap,
            'departemen' => $employee->department->nama_departemen,
            'jabatan' => $employee->position->nama_jabatan,
            'tipe_pengajuan' => $request->tipe_pengajuan,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'dokumen' => $dokumenPath,
        ]);

        return redirect()->route('requests.index')->with('success', 'Pengajuan berhasil diperbarui!');
    }

    // Hapus pengajuan
    public function destroy($id)
    {
        $requestItem = Pengajuan::findOrFail($id);
        $requestItem->delete();

        return redirect()->route('requests.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
