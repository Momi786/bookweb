@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/news')}}">News</a></li>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="">News Title</label>
            <input type="text" name="newsTitle" value="{{$data->newsTitle}}" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <img src="{{URL::to('storage/app')}}/{{$data->newsImg}}" alt="" class="mb-2 mt-2" width="100px" height="100px">
            <input type="file" name="newsImg"  class="form-control">
        </div>
    </div>
    @if ($value['usertype'] != 2)
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Author </label>
            <select name="authorId" class="form-control" required>
                @foreach($Author as $Auth)
                    @php
                        $userInfo = $Auth->GetUserInfo();
                    @endphp
                    <option value="{{$userInfo->userId}}" {{$userInfo->userId == $data->authorId ? 'selected' : ''}}>{{$userInfo->name}}</option>
                @endforeach
            </select>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Short Description</label>
            <textarea name="shotDes" value="" class="form-control">{{$data->shotDes}}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Detail Description</label>
            <textarea name="editor1"  class="form-control">
                @php
                $detail = html_entity_decode($data->detailDes);
                echo $detail;
            @endphp
            </textarea>
        </div>
    </div>
    <br/>

    <input type="submit" class="btn btn-primary" value="Update">
</form>

@endsection
