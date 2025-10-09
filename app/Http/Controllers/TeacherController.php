<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('name')->paginate(10);
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'nullable|string|max:50|unique:teachers,nip',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:teachers,email',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string',
        ]);

        try {
            Teacher::create($data);
        } catch (\Illuminate\Database\QueryException $e) {
            // handle unique constraint or other db errors gracefully
            return back()->withInput()->withErrors(['database' => 'Gagal menyimpan data guru: ' . $e->getMessage()]);
        }

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus');
    }


}

