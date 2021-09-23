@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/orders')}}">Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
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
                    <h4>Order Detail</h4>
                    <!-- <a href="{{URL::to('admin/news/add')}}" class="btn btn-primary btn-sm">Add New</a> -->
                </div><br>
                <!-- <p class="text-right">
                    <button type="submit" name="submit" value="delete" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
                </p> -->
                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Products</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php    $sr=1   @endphp
                        @foreach($totalData as $data)
                        @php
                            $Products = $data->GetDetail();
                        @endphp
                            <tr>
                                <td>
                                    {{$sr++}}
                                </td>
                                <td>{{$Products->name}}</td>
                                <td>{{$data->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
</form>
@endsection
