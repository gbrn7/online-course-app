<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\News;
use App\Models\Video;
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
            ->paginate(9);

        return view('information', ['news' => $news]);
    }

    public function informationDetail(string $ID)
    {
        $news = News::find($ID);

        if (!$news) return back();

        return view('information-detail', ['news' => $news]);
    }

    public function courses()
    {
        $courses = Course::paginate(9);

        return view('course', ['courses' => $courses]);
    }

    public function detailCourse($ID)
    {
        $course = Course::find($ID);

        return view('course-detail', compact('course'));
    }

    public function videoCourses()
    {
        $videos = Video::paginate(9);

        return view('course-video', ['videos' => $videos]);
    }

    public function videoDetailCourse($ID)
    {
        $video = Video::find($ID);

        return view('course-video-detail', compact('video'));
    }
}
