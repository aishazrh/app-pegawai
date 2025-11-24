<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departments = Department::query()
            ->with(['head', 'employees'])
            ->when($search, function ($query, $search) {
                $query->where('nama_departemen', 'like', "%{$search}%");
            })
            ->get();

        $employees = Employee::all();

        return view('departments.index', compact('departments', 'search'));
    }

    public function create()
    {
        $employees = Employee::all();

        return view('departments.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen',
        ]);

        Department::create([
            'nama_departemen'  => $request->nama_departemen,
            'head_employee_id' => $request->head_employee_id, // ⬅️ ini penting
        ]);

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $department = Department::findOrFail($id);

        return view('departments.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);
        $employees = Employee::all();

        return view('departments.edit', compact('department', 'employees'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $id,
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'nama_departemen'  => $request->nama_departemen,
            'head_employee_id' => $request->head_employee_id,
        ]);

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil dihapus!');
    }
}
