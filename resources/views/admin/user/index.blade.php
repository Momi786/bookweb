@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                <h4>All Users</h4>
                <p>
                    <a href="{{URL::to('admin/user/add')}}" class="btn btn-primary btn-sm mr-2">Add New</a>
                </p>
            </div><br>
            <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Opertions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userData as $data)
                        @php
                            $userInfo = $data->GetUserInfo();
                            $userType = $data->GetUserType();
                        @endphp
                        <tr>
                            <td>
                                {{$data->id}}
                            </td>
                            <td>{{$data->username}}</td>
                            <td>{{isset($userInfo) ? $userInfo->name : ''}}</td>
                            <td>{{isset($userType) ? $userType->usertype : ''}}</td>
                            <td>
                                <a href="{{URL::to('admin/user/update')}}/{{$data->id}}" class="btn btn-primary btn-sm">Update</a>
                                <a href="{{URL::to('admin/user/delete')}}/{{$data->id}}" class="deleteAlert btn btn-danger btn-sm">Delete</a>
                                @if($data->pending == 1)
                                    <a href="{{URL::to('admin/user/active')}}/{{$data->id}}" class="btn btn-warning btn-sm">Active</a>
                                @else
                                    <a href="{{URL::to('admin/user/Deactive')}}/{{$data->id}}" class="btn btn-secondary btn-sm">Deactive</a>
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
