@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/news')}}">News</a></li>
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
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="">News Title</label>
            <input type="text" name="newsTitle" class="form-control" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for="">News Image</label>
            <input type="file" name="newsImg" class="form-control" required>
        </div>
    </div>
    @if ($value['usertype'] != 2)
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <label for=""> Author </label>
                <select name="authorId" class="form-control" required>
                    @foreach($Author as $Auth)
                        @php
                            $userInfo = $Auth->GetUserInfo();
                        @endphp
                        <option value="{{$userInfo->userId}}">{{$userInfo->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Short Description</label>
            <textarea name="shotDes" class="form-control"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <label for=""> Detail Description</label>
            <textarea name="editor1" class="form-control"></textarea>
        </div>
    </div>
    <br/>

    <input type="submit" class="btn btn-primary" value="Save">
</form>

@endsection
