<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassRoom;

class ClassroomController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::orderBy('grade')->orderBy('name')->paginate(10);
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'grade' => 'required|string|max:10',
            'student_count' => 'nullable|integer|min:0'
        ]);

        ClassRoom::create($data);

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    public function destroy(ClassRoom $class)
    {
        $class->delete();
        return redirect()->route('classes.index')->with('success', 'Kelas berhasil dihapus');
    }
}
