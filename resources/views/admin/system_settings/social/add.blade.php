@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/system-settings/social-media')}}">Social Media</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <p>
            You can get font awesome cheets by clicking
            <a href="https://fontawesome.com/cheatsheet" target="_blank">Here</a>
        </p>
        <label for=""> Icon </label>
        <input type="text" name="icon" placeholder="e.g. f522 or f6cf" class="form-control mb-2" required>
        <label for=""> Title </label>
        <input type="text" name="title" class="form-control mb-2" required>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
