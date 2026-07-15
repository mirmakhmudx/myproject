<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditNewsRequest;
use App\Http\Requests\NewsRequest;
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
        $news = Neweducation::paginate(10);
        return view('admin.news.allNews', compact("news"));
    }

    public function EditNewsPage($id)
    {
        $news = Neweducation::findOrFail($id);
        return view('admin.news.editNews', compact('news'));
    }

    public function addNewsPost(NewsRequest $request)
    {
        $data = $request->validated();

        $courseImage = $request->file("image");
        $newCourseImage = rand() . "_" . $courseImage->getClientOriginalName();
        $courseImage->move(public_path('assets/image'), $newCourseImage);

        $data['image'] = $newCourseImage;
        $request->user()->news()->create($data);
        return redirect()->route('allNews.page')->with('success', 'News created successfully!');
    }

    public function EditNewsPost(EditNewsRequest $request)
    {
        $news = Neweducation::find($request->newsId);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path('assets/image/' . $news->image))) {
                unlink(public_path('assets/image/' . $news->image));
            }
            $image = $request->file('image');
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/image'), $imageName);

            $data['image'] = $imageName;
        }
        $news->update($data);

        return redirect()->route('allNews.page')->with('success', 'Course updated successfully!');
    }


    public function DeleteNewsPost($id)
    {
          $news = Neweducation::find($id);

        if ($news->image && file_exists(public_path('assets/image/' . $news->image))) {
            unlink(public_path('assets/image/' . $news->image));
        }
        $news->delete();
        return redirect()->back()->with(['delete' => 'News deleted successfully']);
    }
}
