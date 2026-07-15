<?php

namespace App\Http\Controllers;

use App\Http\Requests\addCoursePost;
use App\Http\Requests\EditCourseRequest;
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
        $coursenew = Course::paginate(5);
        return view('admin.course.allCourse', compact("coursenew"));
    }


    public function addCoursePost(addCoursePost $request)
    {
        $data = $request->validated();
        $courseImage = $request->file("image");
        $newCourseImage = rand() . "_" . $courseImage->getClientOriginalName();
        $courseImage->move(public_path('assets/image'), $newCourseImage);

        $data['image'] = $newCourseImage;
        $request->user()->course()->create($data);
        return redirect()->route('allCourse.page')->with('success', 'Post saved successfully');
    }

    public function EditPage($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.course.editCourse', compact('course'));
    }

    public function EditPost(EditCourseRequest $request)
    {
        $course = Course::find($request->courseId);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($course->image && file_exists(public_path('assets/image/' . $course->image))) {
                unlink(public_path('assets/image/' . $course->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/image'), $imageName);

            $data['image'] = $imageName;
        }
        $course->update($data);

        return redirect()->route('allCourse.page')->with('success', 'Course updated successfully!');
    }

    public function deleteCoursePost($id)
    {
        $course = Course::findOrFail($id);

        if ($course->image && file_exists(public_path('assets/image/' . $course->image))) {
            unlink(public_path('assets/image/' . $course->image));
        }

        $course->delete();

        return back()->with('delete', 'Course deleted successfully');
    }
}
