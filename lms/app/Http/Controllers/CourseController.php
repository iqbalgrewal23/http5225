<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('professor')->get(); // Eager load the professor relationship
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $professors = Professor::all();
        return view('courses.create', compact('professors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function edit(Course $course)
    {
        $professors = Professor::all(); // Fetch all available professors
        return view('courses.edit', compact('course', 'professors'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'professor_id' => 'nullable|exists:professors,id', // Validate professor_id
        ]);

        $course->update($request->only(['name', 'description', 'professor_id']));

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}