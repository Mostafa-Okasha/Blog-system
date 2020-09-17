@extends('../layout')

@section('title')
    An Admin
@endsection
@section('content')
    <h1>{{ $admins->id }}</h1>
    <p>{{ $admins->username }}</p>
    <p>{{ $admins->email }}</p>
    <a class="btn btn-primary" href="{{ url('admins/edit',$admins->id) }}">Edit</a>
    <a class="btn btn-danger" href="{{ url('admins/delete',$admins->id) }}">Delete</a>
@endsection
