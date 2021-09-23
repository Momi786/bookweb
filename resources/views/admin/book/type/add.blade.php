@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book')}}">Book</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book/type')}}">Type</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <label for=""> Book Type Name </label>
        <input type="text" name="name" class="form-control" required>
        <br>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
