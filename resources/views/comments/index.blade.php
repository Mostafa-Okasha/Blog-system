@extends('../layout');

@section('title')
    All Posts
@endsection
@section('content')
    <h1>All Comments</h1>
    @foreach ($posts as $post)
        <a  href="{{ url('comments/show',$post->id) }}">{{ $post->author }}</a>
        <h1>Description</h1>
        <p>{{ $post->comment }}</p>
        <hr>
    @endforeach
@endsection
