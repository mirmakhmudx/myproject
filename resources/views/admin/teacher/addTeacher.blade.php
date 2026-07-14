@extends('admin.dashboard')

@section('content')
<div class="row">
    <div class="col-6">
         @if($msg = Session::get("succes"))
            <p class="alert alert-success">{{$msg}}</p>
        @endif
        <form action="{{ route('addTeacher.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputtitle1" class="form-label">name</label>
                <input type="text" name="name" class="form-control" id="exampleInputtitle1" aria-describedby="titleHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputtitle1" class="form-label">job</label>
                <input type="text" name="job" class="form-control" id="exampleInputtitle1" aria-describedby="titleHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputDescription" class="form-label">description</label>
                <input type="text" name="description" class="form-control" id="exampleInputDescription">
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">image</label>
                <input type="file" name="image" class="form-control" id="exampleInputImage">
            </div>

            <button type="submit" class="btn btn-primary">Add News</button>
        </form>
    </div>
</div>

@endsection