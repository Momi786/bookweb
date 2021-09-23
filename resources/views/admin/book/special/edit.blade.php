@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book')}}">Book</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book/special')}}">Special Offer</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
            <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <label for=""> All Books </label>
        <input type="text" name="" value="{{$selectedBook->name}}" id="" class="form-control" disabled>
        <label for="">Flash Sale Percentage</label>
        <input type="number" name="salePercent" value="{{$data->salePercent}}" class="form-control" onKeyPress="if(this.value.length==2) return false;" min="1" max="99" required><br/>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
