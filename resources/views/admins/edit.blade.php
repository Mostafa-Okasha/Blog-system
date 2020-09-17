@extends('../layout')

@section('title')
    Edit Admin
@endsection
@section('content')
    <h1>Edit Admin</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h5 class="alert alert-danger text-center m-auto w-50">{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ url('admins/update',$admins->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" value="{{ $admins->username }}" class="form-control" name="name">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" value="{{ $admins->email }}" class="form-control" name="email">
            </div>
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="{{ $admins->password }}" class="form-control" name="pass">
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input class="form-control-file" type="file"  name="image">
            </div>
            <button type="submit" class="btn btn-primary my-3">Update Admin</button>
    </form>
@endsection
