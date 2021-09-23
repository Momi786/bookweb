@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/client')}}">Client</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
            <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>First Name:</label>
                <input type="text" name="firstName" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>Last Name:</label>
                <input type="text" name="lastName" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <br/>

        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
