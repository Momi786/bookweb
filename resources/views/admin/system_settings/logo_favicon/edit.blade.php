@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/system-settings/logo-favicon')}}">Logo & Favicon</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" width="100px" height="100px">
        <input type="file" name="image" class="form-control mb-2">
        <label for=""> Active </label>
        <input type="checkbox" name="active" value="1" {{$data->active == 1 ? 'checked' : ''}}><br>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>

@endsection
