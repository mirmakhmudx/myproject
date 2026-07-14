<?php

namespace App\Http\Controllers;

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
        $teacher = Teacher::all();
        return view('admin.teacher.allTeacher', compact('teacher'));
    }


    public function addTeacherPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'job' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $teachImage = $request->file("image");
        $newTeacherImage = rand() . "_" . $teachImage->getClientOriginalName();
        $teachImage->move(public_path('assets/image'), $newTeacherImage);

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->description = $request->description;
        $teacher->image = $newTeacherImage;
        $teacher->job = $request->job;




        if ($request->user()->teacher()->save($teacher)) {
            $msg = "post save succesfuly";
        }

        return redirect()->back()->with(['succes' => $msg]);
    }

    public function EditTeacherPage($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.editTeacher', compact('teacher'));
    }

    public function EditTeacherPost(Request $request)
{
    $request->validate([
        'name' => 'required',
        'job' => 'required',
        'description' => 'required',
        'image' => 'nullable|image' 
    ]);

    $teacher = Teacher::findOrFail($request->teacherId);

    // Agar yangi rasm bo‘lsa
    if ($request->hasFile('image')) {
        if ($teacher->image && file_exists(public_path('assets/image/' . $teacher->image))) {
            unlink(public_path('assets/image/' . $teacher->image));
        }

        $teachImage = $request->file("image");
        $newTeacherImage = rand() . "_" . $teachImage->getClientOriginalName();
        $teachImage->move(public_path('assets/image'), $newTeacherImage);
        $teacher->image = $newTeacherImage;
    }

    // Ma’lumotlarni yangilaymiz
    $teacher->name = $request->name;
    $teacher->description = $request->description;
    $teacher->job = $request->job;
    $teacher->save();

    return redirect()->route('allTeacher.page')->with('success', 'Teacher updated successfully!');
}


public function DeleteTeacherPost($id)
{
       $teacher = Teacher::find($id);

        if (!$teacher) {
            return redirect()->back()->with('error', 'Course not found');
        }

        if ($teacher->image != "") {
            $teacherImage = public_path('assets/image/' . $teacher->image);
            if (file_exists($teacherImage)) {
                unlink($teacherImage);
            }
        }

        $teacher->delete();

        return redirect()->back()->with(['delete' => 'teacher deleted successfully']);
}
}
