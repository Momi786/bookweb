@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/system-settings/main-menu')}}">Main Menu</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <label for=""> Title </label>
        <input type="text" name="name" class="form-control mb-2" required>
        <label for=""> Link </label>
        <input type="text" name="link" placeholder="{{URL::to('')}} after" class="form-control mb-2" required>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
