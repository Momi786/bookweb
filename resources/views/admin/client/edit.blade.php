@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/client')}}">clieny</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    @if(Session::has('danger'))
        @php $message = Session::get('danger'); @endphp
            <div class="alert alert-danger">{{$message}}</div>
        @php Session::pull('danger'); @endphp
    @endif
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>First Name:</label>
                <input type="text" name="firstName" value="{{$data->firstName}}" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>Last Name:</label>
                <input type="text" name="lastName" value="{{$data->lastName}}" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>Email:</label>
                <input type="email" name="email" value="{{$data->email}}" class="form-control" required>
            </div>
        </div>
        <br/>

        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
