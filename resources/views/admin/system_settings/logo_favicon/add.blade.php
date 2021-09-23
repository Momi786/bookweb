@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/system-settings/logo-favicon')}}">Logo & Favicon</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="{{URL::to('/admin/system-settings/logo-favicon/add')}}" method="post" enctype="multipart/form-data">
        <label for=""> Image </label>
        <input type="file" name="image" class="form-control mb-2" required>
        <label for=""> Active </label>
        <input type="checkbox" name="active" value="1" class=""><br>
        <input type="hidden" name="name" class="form-control mb-2" value="{{$name}}">
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
