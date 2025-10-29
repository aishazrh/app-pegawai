<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $positions = Position::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_jabatan', 'like', "%{$search}%");
            })
            ->get();

        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ]);

        Position::create([
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
        ]);

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.show', compact('position'));
    }

    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $id,
            'gaji_pokok' => 'nullable|numeric|min:1000000',
        ]);

        $position = Position::findOrFail($id);
        $position->update($request->only(['nama_jabatan', 'gaji_pokok']));

        return redirect()->route('positions.index')
            ->with('success', 'Jabatan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')
            ->with('success', 'Jabatan berhasil dihapus!');
    }
}
