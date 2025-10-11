<?php

namespace App\Http\Controllers;

use App\Models\TeacherAbsence;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAbsenceController extends Controller
{
    public function create()
    {
        $teachers = Teacher::all();
        $selected = request()->query('teacher_id');
        return view('teacher_absences.create', compact('teachers'))->with('selected_teacher_id', $selected);
    }

    public function store(Request $request)
    {
        // If teacher_id not in POST (rare), try to get from query param
        if (!$request->has('teacher_id') && $request->query('teacher_id')) {
            $request->merge(['teacher_id' => $request->query('teacher_id')]);
        }

        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'date' => 'required|date',
            'reason' => 'nullable|string|max:1000',
        ]);

        $validated['type'] = 'sick';
        $validated['status'] = 'pending';
        $validated['created_by'] = Auth::id();

        TeacherAbsence::create($validated);

        return redirect()->route('teachers.index')->with('success', 'Izin sakit berhasil dikirim');
    }
}
