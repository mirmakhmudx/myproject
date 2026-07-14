<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Neweducation;
use App\Models\Teacher;

class PageController extends Controller
{
    public function homePage()
    {
        $coursesnew = Course::all();
        $news = Neweducation::all();
        return view('index', compact("coursesnew", "news"));
    }

    public function aboutPage()
    {
        return view('about');
    }

    public function galleryPage()
    {
        return view('gallery');
    }

   public function newsPage()
   {
       return view('news');
   }

    public function staffPage()
    {
        $teacher = Teacher::all();
        return view('staff', compact("teacher"));
    }

    public function contactPage()
    {
        return view('contact');
    }
}
