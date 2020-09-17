@extends('../layout');

@section('title')
    All Posts
@endsection
@section('content')
    <h1>All Posts</h1>
    @foreach ($posts as $post)
        <a  href="{{ url('posts/show',$post->id) }}">{{ $post->title }}</a>
        <h1>Admin Name</h1>
        <p>{{ $post->user->username }}</p>
        <h1>Description</h1>
        <p>{{ $post->desc }}</p>
        <hr>
    @endforeach
@endsection
