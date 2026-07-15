<?php

namespace App\Http\Controllers;

use App\Http\Requests\addTeacherRequest;
use App\Http\Requests\EditTeacherRequest;
use App\Models\Neweducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Teacher;

class AdminTeacherController extends Controller
{
    public function addTeacherPage()
    {
        return view('admin.teacher.addTeacher');
    }

    public function allTeacherPage()
    {
        $teacher = Teacher::paginate(10);
        return view('admin.teacher.allTeacher', compact('teacher'));
    }


    public function addTeacherPost(addTeacherRequest $request)
    {
        $data = $request->validated();

        $courseImage = $request->file("image");
        $newCourseImage = rand() . "_" . $courseImage->getClientOriginalName();
        $courseImage->move(public_path('assets/image'), $newCourseImage);

        $data['image'] = $newCourseImage;
        $request->user()->teacher()->create($data);
        return redirect()->route('allNews.page')->with('success', 'News created successfully!');
    }

    public function EditTeacherPage($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.editTeacher', compact('teacher'));
    }

    public function EditTeacherPost(EditTeacherRequest $request)
    {
        $teacher = Teacher::findOrFail($request->teacherId);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($teacher->image && file_exists(public_path('assets/image/' . $teacher->image))) {
                unlink(public_path('assets/image/' . $teacher->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/image'), $imageName);

            $data['image'] = $imageName;
        }
        $teacher->update($data);

        return redirect()->route('allNews.page')->with('success', 'Teacher updated successfully!');
    }


    public function DeleteTeacherPost($id)
    {
        $teacher = Teacher::find($id);

        if ($teacher->image && file_exists(public_path('assets/image/' . $teacher->image))) {
            unlink(public_path('assets/image/' . $teacher->image));
        }
        $teacher->delete();
        return redirect()->back()->with(['delete' => 'teacher deleted successfully']);
    }
}
