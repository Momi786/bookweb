@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/book')}}">Book</a></li>
    <li class="breadcrumb-item active" aria-current="page">Flash Sale</li>
@endsection
@section("content")
<form action="" method="post">
    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
        <div class="col-md-12">
            @if(Session::has('danger'))
                @php $message = Session::get('danger'); @endphp
                    <div class="alert alert-danger">{{$message}}</div>
                @php Session::pull('danger'); @endphp
            @endif
            @if(Session::has('success'))
                @php $message = Session::get('success'); @endphp
                <div class="alert alert-success">{{$message}}</div>
                @php Session::pull('success'); @endphp
            @endif
            <div class="d-flex justify-content-between">
                <h4>All Flash Sale Books</h4>
                <a href="{{URL::to('admin/book/flash/add')}}" class="btn btn-primary btn-sm">Add New</a>
            </div><br>
            <p class="text-right">
                <button type="submit" name="submit" value="delete" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
            </p>
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Flash Sale Percentage</th>
                        <th>End Time</th>
                        <th>Opertions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($totalSale as $data)
                        @php
                            $book = $data->GetBook();
                        @endphp
                        <tr>
                            <td>
                                <input type="checkbox" name="feature[]" value="{{$data->id}}">
                                {{$data->id}}
                            </td>
                            <td>{{isset($book) ? $book->name : ''}}</td>
                            <td>{{$data->salePercent}}%</td>
                            <td>{{$data->endTime}}</td>
                            <td>
                                <a href="{{URL::to('admin/book/flash/update')}}/{{$data->id}}" class="btn btn-primary btn-sm">Update</a>
                                <a href="{{URL::to('admin/book/flash/delete')}}/{{$data->id}}" class="btn btn-danger btn-sm deleteAlert">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection
