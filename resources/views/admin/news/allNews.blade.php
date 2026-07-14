@extends('admin.dashboard')

@section('content')
@if($msg = Session("delete"))
            <p class="alert alert-success">{{session('delete')}}</p>
        @endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">T/R</th>
            <th scope="col">title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news as $neww )
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td scope="">{{$neww->title}}</td>
            <td scope="">{{$neww->description}}</td>
            <td><img src="{{ asset('assets/image/'.$neww->image) }}" alt="" width="100"></td>

            <td>
                <a href="{{route('EditNews.page' , ['id'=>$neww->id])}}" class="btn btn-warning">Edit</a>
            </td>
            <td>
                 <a href="{{route('DeleteNews.post' , ['id'=>$neww->id])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection