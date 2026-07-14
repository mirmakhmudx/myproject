<?php

namespace App\Http\Controllers;

use App\Models\Neweducation;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function addNewsPage()
    {
        return view('admin.news.addNews');
    }

    public function allNewsPage()
    {
        $news = Neweducation::all();
        return view('admin.news.allNews', compact("news"));
    }

    public function EditNewsPage($id)
    {
        $news = Neweducation::findOrFail($id);
        return view('admin.news.editNews', compact('news'));
    }

    public function EditNewsPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);

        $news = Neweducation::find($request->newsId);

        if (!$news) {
            return redirect()->back()->with('error', 'News not found!');
        }

        // Agar yangi rasm bo‘lsa
        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path('assets/image/' . $news->image))) {
                unlink(public_path('assets/image/' . $news->image));
            }

            $newImage = $request->file("image");
            $newEducationImage = rand() . "_" . $newImage->getClientOriginalName();
            $newImage->move(public_path('assets/image'), $newEducationImage);
            $news->image = $newEducationImage;
        }

        // Ma’lumotlarni yangilaymiz
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();

        return redirect()->route('allNews.page')->with('success', 'News updated successfully!');
    }

    public function addNewsPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        $newImage = $request->file("image");
        $newEducationImage = rand() . "_" . $newImage->getClientOriginalName();
        $newImage->move(public_path('assets/image'), $newEducationImage);

        $news = new Neweducation();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->image = $newEducationImage;

        if ($request->user()->news()->save($news)) {
            $msg = "Post saved successfully!";
        }

        return redirect()->back()->with(['success' => $msg]);
    }


    public function DeleteNewsPost($id)
    {
          $news = Neweducation::find($id);

        if (!$news) {
            return redirect()->back()->with('error', 'Course not found');
        }

        if ($news->image != "") {
            $newsImage = public_path('assets/image/' . $news->image);
            if (file_exists($newsImage)) {
                unlink($newsImage);
            }
        }

        $news->delete();

        return redirect()->back()->with(['delete' => 'News deleted successfully']);
    }
}
