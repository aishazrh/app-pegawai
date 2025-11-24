<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with('employee')->get();

        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        $employees = Employee::with(['department', 'position'])->get();
        $departments = Department::all();
        $positions = Position::all();

        return view('reports.create', compact('employees', 'departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'rating_kinerja' => 'required|integer|min:1|max:100',
            'bulan' => 'required|string',
        ]);

        Report::create($request->all());

        return redirect()->route('reports.index')->with('success', 'Report berhasil dibuat.');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        $employees = Employee::with(['department', 'position'])->get();
        return view('reports.edit', compact('report', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        // $report->karyawan_id = $request->karyawan_id;
        $report->bulan = $request->bulan;
        $report->rating_kinerja = $request->rating_kinerja;
        $report->save();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui');
    }

    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Report berhasil dihapus.');
    }
}
