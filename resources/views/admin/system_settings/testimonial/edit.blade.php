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
    <li class="breadcrumb-item active" aria-current="page">Update</li>
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
            <input type="text" name="title" value="{{$data->title}}" class="form-control" required>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Designation</label>
            <input type="text" name="designation" value="{{$data->designation}}" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" class="mb-2 mt-2" width="100px" height="100px">
            <input type="file" name="image"  class="form-control">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <label for="">Rating</label>
            <select name="rating" class="form-control">
                <option value="1" {{$data->rating == 1 ? 'selected' : ''}}>1</option>
                <option value="2" {{$data->rating == 2 ? 'selected' : ''}}>2</option>
                <option value="3" {{$data->rating == 3 ? 'selected' : ''}}>3</option>
                <option value="4" {{$data->rating == 4 ? 'selected' : ''}}>4</option>
                <option value="5" {{$data->rating == 5 ? 'selected' : ''}}>5</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="">Description</label>
            <textarea name="description" value="" class="form-control">{{$data->description}}</textarea>
        </div>
    </div>
    <br/>

    <input type="submit" class="btn btn-primary" value="Update">
</form>

@endsection
