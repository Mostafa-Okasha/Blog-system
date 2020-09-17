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
    <form action="{{ url('comments/update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Author</label>
          <input type="text" value="{{ $post->author }}" class="form-control" name="title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">comment</label>
          <input type="text" value="{{ $post->comment }}" class="form-control" name="desc">
        </div>
            <button type="submit" class="btn btn-primary my-3">Update comment</button>
    </form>
@endsection
