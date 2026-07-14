@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-6">
        @if($msg = Session::get("succes"))
            <p class="alert alert-success">{{$msg}}</p>
        @endif
        <form action="{{route('EditNews.post')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="exampleInputtitle1" class="form-label">title</label>
                <input type="text" name="title"  value="{{$news->title}}"class="form-control" id="exampleInputtitle1" aria-describedby="titleHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">Description</label>
                <input type="text" name="description" value="{{$news->description}}" class="form-control" id="exampleInputDescription">
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">image</label>
                <input type="file" name="image"  class="form-control" id="exampleInputImage">
                <img src="{{ asset('assets/image/'.$news->image) }}" alt="" width="100 ">
            </div>

        <input type="hidden" name="newsId" value="{{ $news->id }}">

            <button type="submit" class="btn btn-primary">Edit News</button>
        </form>
    </div>
</div>

@endsection