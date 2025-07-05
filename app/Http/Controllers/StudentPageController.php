<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\News;
use Illuminate\Http\Request;

class StudentPageController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_active', true)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('home', ['courses' => $courses]);
    }

    public function information()
    {
        $news = News::OrderBy('id', 'desc')
            ->paginate(10);

        return view('information', ['news' => $news]);
    }

    public function informationDetail(string $ID)
    {
        $news = News::find($ID);

        if (!$news) return back();

        return view('information-detail', ['news' => $news]);
    }
}
