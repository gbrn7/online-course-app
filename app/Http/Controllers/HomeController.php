<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::where('is_active', true)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('home', ['courses' => []]);
    }
}
