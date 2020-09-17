@extends('../layout');

@section('title')
    Login Form
@endsection
@section('content')
    <h1>Login Form</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h5 class="alert alert-danger text-center m-auto w-50">{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ url('/admins/handlelog') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" value="{{ old('pass') }}" class="form-control" name="pass">
    </div>
        <button type="submit" class="btn btn-primary my-3">Login</button>
    </form>
@endsection
