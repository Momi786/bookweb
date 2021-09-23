@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book')}}">Book</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book/flash')}}">Flash Sale</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
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
    <form action="" method="post" enctype="multipart/form-data">
        <label for=""> All Books </label>
        <select name="bookId" id="" class="form-control" required>
            @foreach ($totalBooks as $book)
                @php
                    $result = $book->GetSale();
                @endphp
                @if ($result == "success")
                    <option value="{{$book->id}}">{{$book->name}}</option>
                @endif
            @endforeach
        </select>
        <div class="row">
            <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                <label for="">Sale Percentage</label>
                <input type="number" name="salePercent" onKeyPress="if(this.value.length==2) return false;" min="1" max="99" class="form-control" required>
            </div>
            <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                <label for="">End Time</label>
                <input type="datetime-local" name="endTime" class="form-control" required>
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
