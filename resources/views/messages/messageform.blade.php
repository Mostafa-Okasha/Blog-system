@extends('../layout');

@section('title')
    Contact Us
@endsection
@section('content')
    <h1>Contact Us</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h5 class="alert alert-danger text-center m-auto w-50">{{ $error }}</h5>
        @endforeach
    @endif
    <form action="{{ url('messages/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" value="{{ old('email') }}" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control" value="{{ old('phone') }}" name="phone">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Message</label>
            <input type="text" class="form-control" value="{{ old('message') }}" name="message">
        </div>
        <button type="submit" class="btn btn-primary my-3">Send Message</button>
    </form>
@endsection
