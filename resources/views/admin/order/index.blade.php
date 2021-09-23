@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
                    <h4>All Orders</h4>
                    <!-- <a href="{{URL::to('admin/news/add')}}" class="btn btn-primary btn-sm">Add New</a> -->
                </div><br>
                <!-- <p class="text-right">
                    <button type="submit" name="submit" value="delete" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
                </p> -->
                <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Total Products</th>
                            <th>Order Price</th>
                            <th>Status</th>
                            <th>Opertions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalData as $data)
                        @php
                            $Products = $data->GetProducts();
                            $User = $data->GetUser();
                        @endphp
                            <tr>
                                <td>
                                    <!-- <input type="checkbox" name="feature[]" value="{{$data->id}}"> -->
                                    {{$data->id}}
                                </td>
                                <td>{{$User->firstName}} </td>
                                <td>{{count($Products)}}</td>
                                <td>${{$data->totalPrice}}</td>
                                <td>
                                    @if ($data->status == 1)
                                        <p class="text-success">Complete</p>
                                    @else
                                        <p class="text-warning">Incomplete</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{URL::to('admin/orders/detail')}}/{{$data->id}}" class="btn btn-info btn-sm">Detail</a>
                                    @if($data->status == 0 )
                                        <a href="{{URL::to('admin/orders/complete')}}/{{$data->id}}" class="btn btn-primary btn-sm">Complete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
</form>
@endsection
