<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Employee;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with('karyawan')->get();
        return view('pengajuans.index', compact('pengajuans'));
    }

    public function create()
    {
        $employees = Employee::with(['department', 'position'])->get();
        return view('pengajuans.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tipe_pengajuan' => 'required|in:sakit,izin,cuti,peningkatan_gaji,pengunduran_diri',
            'tanggal_pengajuan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $employee = Employee::find($request->karyawan_id);

        $dokumenPath = $request->file('dokumen')
            ? $request->file('dokumen')->store('dokumen_requests', 'public')
            : null;

        Pengajuan::create([
            'karyawan_id' => $request->karyawan_id,
            'nama_karyawan' => $employee->nama_lengkap,
            'departemen' => $employee->department->nama_departemen,
            'jabatan' => $employee->position->nama_jabatan,
            'tipe_pengajuan' => $request->tipe_pengajuan,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'dokumen' => $dokumenPath,
        ]);

        return redirect()->route('pengajuans.index')->with('success', 'Pengajuan berhasil dibuat!');
    }

    public function show($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuans.show', compact('pengajuan'));
    }


    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $employees = Employee::all();
        return view('pengajuans.edit', compact('pengajuan', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tipe_pengajuan' => 'required|in:sakit,izin,cuti,peningkatan_gaji,pengunduran_diri',
            'tanggal_pengajuan' => 'required|date',
            'dokumen' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $employee = Employee::find($request->karyawan_id);

        $dokumenPath = $request->hasFile('dokumen')
            ? $request->file('dokumen')->store('dokumen_requests', 'public')
            : $pengajuan->dokumen;

        $pengajuan->update([
            'karyawan_id' => $request->karyawan_id,
            'nama_karyawan' => $employee->nama_lengkap,
            'departemen' => $employee->department->nama_departemen,
            'jabatan' => $employee->position->nama_jabatan,
            'tipe_pengajuan' => $request->tipe_pengajuan,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'dokumen' => $dokumenPath,
        ]);

        return redirect()->route('pengajuans.index')->with('success', 'Pengajuan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuans.index')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
