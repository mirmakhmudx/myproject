@extends('admin.dashboard')

@section('content')

<div class="row">
    <div class="col-6">
        @if($msg = Session::get("succes"))
            <p class="alert alert-success">{{$msg}}</p>
        @endif
        <form action="{{route('EditCourse.post')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="exampleInputtitle1" class="form-label">title</label>
                <input type="text" name="title"  value="{{$course->title}}"class="form-control" id="exampleInputtitle1" aria-describedby="titleHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">Description</label>
                <input type="text" name="description" value="{{$course->description}}" class="form-control" id="exampleInputDescription">
            </div>
            <div class="mb-3">
                <label for="exampleInputPrice" class="form-label">Price</label>
                <input type="text" name="price" value="{{$course->price}}" class="form-control" id="exampleInputPrice">
            </div>

            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">image</label>
                <input type="file" name="image"  class="form-control" id="exampleInputImage">
                <img src="{{ asset('assets/image/'.$course->image) }}" alt="" width="100 ">
            </div>

<input type="hidden" name="courseId" value="{{ $course->id }}">

            <button type="submit" class="btn btn-primary">Edit Course</button>
        </form>
    </div>
</div>

@endsection