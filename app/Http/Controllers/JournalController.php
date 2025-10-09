<?php

// app/Http/Controllers/JournalController.php
namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::with(['teacher', 'subject', 'classRoom'])
            ->orderBy('date', 'desc')
            ->paginate(10);
        
        return view('journals.index', compact('journals'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $classes = ClassRoom::all();
        
        return view('journals.create', compact('teachers', 'subjects', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'class_id' => 'required|exists:classes,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'material' => 'required|string|max:255',
            'description' => 'nullable|string',
            'student_present' => 'required|integer|min:0',
            'student_absent' => 'required|integer|min:0',
            'notes' => 'nullable|string'
        ]);

    // denormalize names for faster reads and history retention
    $validated['teacher_name'] = Teacher::find($validated['teacher_id'])?->name;
    $validated['subject_name'] = Subject::find($validated['subject_id'])?->name;
    $validated['class_name'] = ClassRoom::find($validated['class_id'])?->name;

    Journal::create($validated);

        return redirect()->route('journals.index')
            ->with('success', 'Jurnal berhasil ditambahkan');
    }

    public function show(Journal $journal)
    {
        $journal->load(['teacher', 'subject', 'classRoom']);
        return view('journals.show', compact('journal'));
    }

    public function edit(Journal $journal)
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $classes = ClassRoom::all();
        
        return view('journals.edit', compact('journal', 'teachers', 'subjects', 'classes'));
    }

    public function update(Request $request, Journal $journal)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subject_id' => 'required|exists:subjects,id',
            'class_id' => 'required|exists:classes,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'material' => 'required|string|max:255',
            'description' => 'nullable|string',
            'student_present' => 'required|integer|min:0',
            'student_absent' => 'required|integer|min:0',
            'notes' => 'nullable|string'
        ]);

    // update denormalized names as well
    $validated['teacher_name'] = Teacher::find($validated['teacher_id'])?->name;
    $validated['subject_name'] = Subject::find($validated['subject_id'])?->name;
    $validated['class_name'] = ClassRoom::find($validated['class_id'])?->name;

    $journal->update($validated);

        return redirect()->route('journals.index')
            ->with('success', 'Jurnal berhasil diperbarui');
    }

    public function destroy(Journal $journal)
    {
        $journal->delete();

        return redirect()->route('journals.index')
            ->with('success', 'Jurnal berhasil dihapus');
    }
}