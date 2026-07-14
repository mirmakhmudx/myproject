<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function addCoursePage()
    {
        return view('admin.course.addCourse');
    }

    public function allCoursePage()
    {
        $coursenew = Course::all();
        return view('admin.course.allCourse', compact("coursenew"));
    }

    public function EditPage($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.editCourse', compact('course'));
    }

    public function EditPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $course = Course::find($request->courseId);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found!');
        }

        if ($request->hasFile('image')) {
            if ($course->image && file_exists(public_path('assets/image/' . $course->image))) {
                unlink(public_path('assets/image/' . $course->image));
            }

            $courseImage = $request->file("image");
            $newCourseImage = rand() . "_" . $courseImage->getClientOriginalName();
            $courseImage->move(public_path('assets/image'), $newCourseImage);

            $course->image = $newCourseImage;
        }

        $course->title = $request->title;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->save();

        return redirect()->route('allCourse.page')->with('success', 'Course updated successfully!');
    }

    public function addCoursePost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $courseImage = $request->file("image");
        $newCourseImage = rand() . "_" . $courseImage->getClientOriginalName();
        $courseImage->move(public_path('assets/image'), $newCourseImage);

        $course = new Course();
        $course->title = $request->title;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->image = $newCourseImage;

        if ($request->user()->course()->save($course)) {
            $msg = "Post saved successfully";
        }

        return redirect()->back()->with(['success' => $msg]);
    }

    public function DeleteCoursePost($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found');
        }

        if ($course->image != "") {
            $courseImage = public_path('assets/image/' . $course->image);
            if (file_exists($courseImage)) {
                unlink($courseImage);
            }
        }

        $course->delete();

        return redirect()->back()->with(['delete' => 'Course deleted successfully']);
    }
}
