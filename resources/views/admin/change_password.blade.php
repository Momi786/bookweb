@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/administration')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    @php
        $value = Session::get('onlineuser');
    @endphp
    <form action="" method="post">
        <label for="">Username</label>
        <input type="text" name="username" value="{{$value['username']}}" class="form-control" disabled><br>
        <label for="">Password</label>
        <input type="password" name="password" value="" class="form-control" required><br>
        <input type="submit" value="Change Password" class="btn btn-primary btn-sm">
    </form>
@endsection
