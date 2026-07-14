@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-6">
         @if($msg = Session::get("succes"))
            <p class="alert alert-success">{{$msg}}</p>
        @endif
        <form action="{{ route('EditTeacher.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputtitle1" class="form-label">name</label>
                <input type="text" name="name" value="{{$teacher->name}}" class="form-control" id="exampleInputtitle1" aria-describedby="titleHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputtitle1" class="form-label">job</label>
                <input type="text" name="job" value="{{$teacher->job}}" class="form-control" id="exampleInputtitle1" aria-describedby="titleHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">description</label>
                <input type="text" name="description" value="{{$teacher->description}}" class="form-control" id="exampleInputDescription">
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">image</label>
                <input type="file" name="image"  class="form-control" id="exampleInputImage">
                <img src="{{ asset('assets/image/'.$teacher->image) }}" alt="" width="100 ">

            </div>

<input type="hidden" name="teacherId" value="{{ $teacher->id }}">


            <button type="submit" class="btn btn-primary">Edit Teacher</button>
        </form>
    </div>
</div>

@endsection