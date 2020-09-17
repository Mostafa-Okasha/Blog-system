@extends('../layout')

@section('title')
    A Posts
@endsection
@section('content')
    <h1>{{ $post->id }}</h1>
    <p>{{ $post->title }}</p>
    <p>{{ $post->desc }}</p>
    <p>{{ $post->content }}</p>
    <img src="{{ asset($post->img) }}">
    <h1>Comments</h1>
    @foreach ($post->comment as $com)
        <h3>{{ $com->comment }}</h3>
    @endforeach
    <a class="btn btn-danger" href="{{ url('comments/create') }}">Add Comment</a>
    <a class="btn btn-primary" href="{{ url('posts/edit',$post->id) }}">Edit</a>
    <a class="btn btn-danger" href="{{ url('posts/delete',$post->id) }}">Delete</a>
@endsection
