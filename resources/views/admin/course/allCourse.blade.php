@extends('admin.dashboard')


@section('content')
@if($msg = Session("delete"))
            <p class="alert alert-success">{{session('delete')}}</p>
        @endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">T/R</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
             <th scope="col">Price</th>
            <th scope="col">Image</th>
             <th scope="col">Edit</th>
              <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
          @foreach($coursenew as $coursee )
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td scope="">{{$coursee->title}}</td>
            <td scope="">{{$coursee->description}}</td>
            <td scope="">{{$coursee->price}}</td>
           <td><img src="{{ asset('assets/image/'.$coursee->image) }}" alt="" width="100"></td>

           <td>
            <a href="{{route('EditCourse.page' , ['id'=>$coursee->id])}}" class="btn btn-warning">Edit</a>
           </td>

           <td>
            <a href="{{route('DeleteCourse.post' , ['id'=>$coursee->id])}}" onclick="return confirm('Malumot ochirilsinmi?')" class="btn btn-danger">Delete</a>
           </td>
        </tr>
        @endforeach

    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $coursenew->links('pagination::bootstrap-4') }}
</div>

@endsection
