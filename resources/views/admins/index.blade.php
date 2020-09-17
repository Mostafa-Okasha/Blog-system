@extends('../layout');

@section('title')
    All Admins
@endsection
@section('content')
    <h1>All Admins</h1>
    @foreach ($admins as $admin)
        <a  href="{{ url('admins/show',$admin->id) }}">{{ $admin->username }}</a>
        <h1>Admin Name</h1>
        <p>{{ $admin->email }}</p>
    @endforeach
@endsection
