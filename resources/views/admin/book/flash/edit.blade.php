@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book')}}">Book</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book/flash')}}">Flash Sale</a></li>
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
        <div class="row">
            <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                <label for="">Flash Sale Percentage</label>
                <input type="number" name="salePercent" value="{{$data->salePercent}}" class="form-control" onKeyPress="if(this.value.length==2) return false;" min="1" max="99" required><br/>
            </div>
            <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                <label for="">End Time</label>
                <input type="datetime-local" id="asd" name="endTime" value="{{date('Y-m-d',strtotime($data->endTime))}}T{{date('H:i',strtotime($data->endTime))}}" class="form-control" required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Update">
    </form>
@endsection
<script>
    function name() {
        var asd = document.getElementById("asd").value;
        console.log(asd)
    }
</script>
