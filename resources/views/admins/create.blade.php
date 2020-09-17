@extends('../layout');

@section('title')
    Create Admin
@endsection
@section('content')
    <h1>Create Admin</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h5 class="alert alert-danger text-center m-auto w-50">{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ url('admins/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">User name</label>
            <input type="text" value="{{ old('name') }}" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="{{ old('pass') }}" class="form-control" name="pass">
        </div>
        <div class="form-group">
            <label>Upload Image</label>
            <input class="form-control-file" type="file"  name="image">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Admin</button>
    </form>
@endsection
