@extends('../layout')

@section('title')
    A Posts
@endsection
@section('content')
    <h1>{{ $post->id }}</h1>
    <p>{{ $post->author }}</p>
    <p>{{ $post->comment }}</p>
    <a class="btn btn-primary" href="{{ url('comments/edit',$post->id) }}">Edit</a>
    <a class="btn btn-danger" href="{{ url('comments/delete',$post->id) }}">Delete</a>
@endsection