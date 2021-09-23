@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Clients</li>
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
                <h4>All Clients</h4>
                <p>
                    <a href="{{URL::to('admin/client/add')}}" class="btn btn-primary btn-sm mr-2">Add New</a>
                </p>
            </div><br>
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Opertions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientData as $data)
                        <tr>
                            <td>
                                {{$data->id}}
                            </td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->firstName}}</td>
                            <td>
                                <a href="{{URL::to('admin/client/update')}}/{{$data->id}}" class="btn btn-primary btn-sm">Update</a>
                                @if ($data->block == 0)
                                    <a href="{{URL::to('admin/client/block')}}/{{$data->id}}" class="deleteAlert btn btn-danger btn-sm">Block</a>
                                @else
                                    <a href="{{URL::to('admin/client/unblock')}}/{{$data->id}}" class="deleteAlert btn btn-info btn-sm">AnBlock</a>
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
