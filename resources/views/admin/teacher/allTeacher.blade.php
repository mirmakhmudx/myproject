@extends('admin.dashboard')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">T/R</th>
            <th scope="col">name</th>
            <th scope="col">job</th>
            <th scope="col">description</th>
            <th scope="col">Image</th>
             <th scope="col">Edit</th>
              <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
          @foreach($teacher as $teachers )
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td scope="">{{$teachers->name}}</td>
            <td scope="">{{$teachers->job}}</td>
            <td scope="">{{$teachers->description}}</td>
           <td><img src="{{ asset('assets/image/'.$teachers->image) }}" alt="" width="100"></td>

           <td>
                <a href="{{route('EditTeacher.page' , ['id'=>$teachers->id])}}" class="btn btn-warning">Edit</a>
           </td>
           <td>
                            <a href="{{route('DeleteTeacher.post' , ['id'=>$teachers->id])}}" onclick="return confirm('Malumot ochirilsinmi?')"   class="btn btn-danger">Delete</a>

           </td>
        </tr>
        @endforeach

    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $teacher->links('pagination::bootstrap-4') }}
</div>

@endsection


