<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('karyawan')->get();
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:20',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $total = $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0);

        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total,
        ]);


        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan!');
    }

    public function show($id)
    {
        $salary = Salary::findOrFail($id);

        return view('salaries.show', compact('salary'));
    }

    public function edit($id)
    {
        $salary = Salary::findOrFail($id);
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:20',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $salary = Salary::findOrFail($id);
        $salary->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $request->gaji_pokok + ($request->tunjangan ?? 0) - ($request->potongan ?? 0),
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Salary::findOrFail($id)->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}
