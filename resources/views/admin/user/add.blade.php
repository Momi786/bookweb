@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/user')}}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
                <label for=""> Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label for=""> Role</label>
                <select name="usertype" class="form-control" required>
                    @foreach($userTypes as $typ)
                        <option value="{{$typ->id}}">{{$typ->usertype}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label for=""> Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label for=""> Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <label for=""> Image</label>
                <input type="file" name="image" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <label for=""> Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
        </div>

        <h5>Social Links</h5>
        <div class="wrapper" element="1">
            <div class="element">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <label for=""> Social Site </label>
                        <select name="social[]"  class="form-control fa" required>
                            @foreach($socialMediaInfo as $social)
                                <option value="{{$social->id}}" class="fa">
                                    @php echo "&#x".$social->icon.";"; @endphp
                                    {{$social->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <label for=""> Social Link </label>
                        <input type="text" name="link[]" class="form-control" required>
                    </div>
                </div><br>
            </div>
            <div class="results"></div>
            <div class="buttons text-right mt-2">
                    <i class="fa fa-plus clone ml-2 text-primary cursorpointer"></i>
            </div>
        </div>
        <br/>

        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
