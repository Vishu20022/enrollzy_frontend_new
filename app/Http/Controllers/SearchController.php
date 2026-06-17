<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Course;
use App\Models\DynamicExam;

class SearchController extends Controller
{
    public function masterSearch(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query || strlen($query) < 2) {
            return response()->json([
                'organisations' => [],
                'courses' => [],
                'exams' => []
            ]);
        }

        // Search Organisations
        $organisations = Organisation::where('status', 1)
            ->where('name', 'LIKE', '%' . $query . '%')
            ->select('id', 'name', 'slug')
            ->take(5)
            ->get()
            ->map(function ($org) {
                return [
                    'id' => $org->id,
                    'name' => $org->name,
                    'link' => $org->detail_url
                ];
            });

        // Search Courses
        $courses = Course::where('status', 1)
            ->where('name', 'LIKE', '%' . $query . '%')
            ->select('id', 'name', 'slug')
            ->take(5)
            ->get()
            ->map(function ($course) {
                return [
                    'id' => $course->id,
                    'name' => $course->name,
                    'link' => route('pages.courses.detail', ['slug' => $course->slug])
                ];
            });

        // Search Exams
        $exams = DynamicExam::where('status', 1)
            ->where('name', 'LIKE', '%' . $query . '%')
            ->select('id', 'name', 'slug')
            ->take(5)
            ->get()
            ->map(function ($exam) {
                return [
                    'id' => $exam->id,
                    'name' => $exam->name,
                    'link' => route('pages.exams.detail', ['slug' => $exam->slug])
                ];
            });

        return response()->json([
            'organisations' => $organisations,
            'courses' => $courses,
            'exams' => $exams
        ]);
    }
}
