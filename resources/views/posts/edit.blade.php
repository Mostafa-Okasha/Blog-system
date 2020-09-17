@extends('../layout')

@section('title')
    Edit Post
@endsection
@section('content')
    <h1>Edit Posts</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h5 class="alert alert-danger text-center m-auto w-50">{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ url('posts/update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" value="{{ $post->title }}" class="form-control" name="title">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text" value="{{ $post->desc }}" class="form-control" name="desc">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>
                <input type="text" value="{{ $post->content }}" class="form-control" name="content">
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input class="form-control-file" type="file"  name="image">
            </div>
            <button type="submit" class="btn btn-primary my-3">Update Post</button>
    </form>
@endsection
