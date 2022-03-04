<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Series;
use Illuminate\Database\Eloquent\Builder;

class CoursesController
{
    public function index()
    {
        $allSeries = Series::with(['purchasables', 'lessons'])
            ->unless(
                current_user()?->hasAccessToUnReleasedProducts(),
                fn (Builder $query) => $query->where('visible', true)
            )
            ->orderBy('sort_order')
            ->get();

        return view('front.pages.courses.index', compact('allSeries'));
    }

    public function show(Series $series, Lesson $lesson)
    {
        $previousLesson = $lesson->getPrevious();
        $nextLesson = $lesson->getNext();

        $title = $lesson->title;
        $description = 'todo'; // $currentVideo->description;

        $series->load(['purchasables.product']);

        return view('front.pages.courses.show', compact(
            'title',
            'description',
            'series',
            'lesson',
            'previousLesson',
            'nextLesson',
        ));
    }
}
