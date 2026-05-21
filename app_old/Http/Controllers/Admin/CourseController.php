<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('discipline')->orderBy('sort_order')->latest()->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $programLevels = \App\Models\ProgramLevel::where('status', true)->get();
        $streamOffereds = \App\Models\StreamOffered::where('status', true)->get();
        $disciplines = \App\Models\Discipline::where('status', true)->get();

        return view(
            'admin.courses.create',
            compact('programLevels', 'streamOffereds', 'disciplines')
        );

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:courses,slug',
            'status' => 'required|boolean',
            'sort_order' => 'required|integer',
            'program_level_id' => 'nullable|exists:program_levels,id',
            'stream_offered_id' => 'nullable|exists:stream_offereds,id',
            'discipline_id' => 'nullable|exists:disciplines,id',
            'duration' => 'nullable|string|max:100',
        ]);

        $course = new Course($request->all());
        if (empty($request->slug)) {
            $course->slug = Str::slug($request->name);
        } else {
            $course->slug = Str::slug($request->slug);
        }
        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
    }

    // public function edit(Course $course)
    // {
    //     return view('admin.courses.edit', compact('course'));
    // }
    public function edit(Course $course)
    {
        $programLevels = \App\Models\ProgramLevel::where('status', true)->get();
        $streamOffereds = \App\Models\StreamOffered::where('status', true)->get();
        $disciplines = \App\Models\Discipline::where('status', true)->get();

        return view(
            'admin.courses.edit',
            compact('course', 'programLevels', 'streamOffereds', 'disciplines')
        );
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug,' . $course->id,
            'status' => 'required|boolean',
            'sort_order' => 'required|integer',
            'program_level_id' => 'nullable|exists:program_levels,id',
            'stream_offered_id' => 'nullable|exists:stream_offereds,id',
            'discipline_id' => 'nullable|exists:disciplines,id',
            'duration' => 'nullable|string|max:100',
        ]);

        $course->name = $request->name;
        $course->slug = Str::slug($request->slug);
        $course->status = $request->status;
        $course->sort_order = $request->sort_order;
        $course->program_level_id = $request->program_level_id;
        $course->stream_offered_id = $request->stream_offered_id;
        $course->discipline_id = $request->discipline_id;
        $course->duration = $request->duration;
        $course->save();

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }

    public function duplicate(Course $course)
    {
        $newCourse = $course->replicate();

        // unique name & slug
        $newCourse->name = $course->name . ' (Copy)';
        $newCourse->slug = $course->slug . '-copy-' . time();

        $newCourse->status = 0; // inactive by default (safe)
        $newCourse->save();


        return redirect()->route('admin.courses.index')
            ->with('success', 'Course duplicated successfully. Please review and update.');
    }

}
