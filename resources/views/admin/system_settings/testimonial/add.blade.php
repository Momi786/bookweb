@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/system-settings/testimonial')}}">News</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add News</li>
@endsection
@section("content")
@if(Session::has('success'))
    @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
    @php Session::pull('success'); @endphp
@endif
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Name</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Designation</label>
            <input type="text" name="designation" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Rating</label>
            <select name="rating" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="">Description</label>
            <textarea name="description" value="" class="form-control"></textarea>
        </div>
    </div>
    <br/>

    <input type="submit" class="btn btn-primary" value="Save">
</form>

@endsection
