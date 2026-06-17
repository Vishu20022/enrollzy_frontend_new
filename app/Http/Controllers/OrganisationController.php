<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    /**
     * Map of slugs to their corresponding organisation_type_ids
     */
    protected $typeMap = [
        'universities' => [1],
        'colleges' => [2],
        'institutes' => [3],
        'schools' => [4],
        'exam-bodies' => [5],
        'counselling-bodies' => [6],
        'regulatory-bodies' => [7],
        'government-agencies' => [8],
    ];

    /**
     * Map of slugs to human readable titles
     */
    protected $titleMap = [
        'universities' => 'All Universities',
        'colleges' => 'All Colleges',
        'institutes' => 'All Institutes',
        'schools' => 'All Schools',
        'exam-bodies' => 'All Exam Conducting Bodies',
        'counselling-bodies' => 'All Counselling Bodies',
        'regulatory-bodies' => 'All Regulatory Bodies',
        'government-agencies' => 'All Government Agencies',
    ];

    public function index($type_slug)
    {
        if (!array_key_exists($type_slug, $this->typeMap)) {
            abort(404);
        }

        $typeIds = $this->typeMap[$type_slug];
        $pageTitle = $this->titleMap[$type_slug];

        $organisations = Organisation::where('status', true)
            ->whereIn('organisation_type_id', $typeIds)
            ->orderBy('name')
            ->get();

        return view('pages.organisations.index', compact('organisations', 'pageTitle', 'type_slug'));
    }

    public function show($type_slug, $slug)
    {
        if (!array_key_exists($type_slug, $this->typeMap)) {
            abort(404);
        }

        $typeIds = $this->typeMap[$type_slug];

        $organisation = Organisation::with([
            'courses.course',
            'courses.programLevel',
            'courses.specialization',
            'courses.entranceExam',
            'courses.campus',
            'campuses',
            'awards',
            'sports',
            'academicResults',
            'feeStructures',
            'organisationType',
            'organisationSubType',
            'accreditations',
            'admissionRoutes'
        ])
        ->whereIn('organisation_type_id', $typeIds)
        ->where('slug', $slug)
        ->where('status', true)
        ->firstOrFail();

        $languages = \App\Models\Language::where('status', 1)->pluck('title', 'id');
        $pageTitle = $this->titleMap[$type_slug];

        return view('pages.organisations.show', compact('organisation', 'languages', 'pageTitle', 'type_slug'));
    }
}
