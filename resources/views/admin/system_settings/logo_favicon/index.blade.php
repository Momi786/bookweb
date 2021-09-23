@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Logo & Favicon</li>
@endsection
@section("content")
    <div class="row p-3">
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
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="p-3" style="background-color:white">
                        <div class="d-flex justify-content-between">
                            <h4>All Logo</h4>
                            <a href="{{URL::to('admin/system-settings/logo/add')}}" class="btn btn-primary btn-sm">Add New</a>
                        </div><br>
                        <table id="myTable" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Active</th>
                                    <th>Opertions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($logos as $log)
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('storage/app')}}/{{$log->image}}" alt="" width="100px" height="100px">
                                        </td>
                                        <td>
                                            @if ($log->active == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <form action="{{URL::to('/admin/system-settings/logo-favicon/active')}}/{{$log->id}}" method="post">
                                                    <input type="checkbox" name="active" value="1" class="formSubmitJq">
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{URL::to('admin/system-settings/logo-favicon/update')}}/{{$log->id}}" class="btn btn-primary btn-sm">Update</a>
                                            @if ($log->active != 1)
                                                <a href="{{URL::to('admin/system-settings/logo-favicon/delete')}}/{{$log->id}}" class="btn btn-danger btn-sm deleteAlert">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="p-3" style="background-color:white">
                        <div class="d-flex justify-content-between">
                            <h4>All Favicon</h4>
                            <a href="{{URL::to('admin/system-settings/favicon/add')}}" class="btn btn-primary btn-sm">Add New</a>
                        </div><br>
                        <table id="myTable1" class="table table-striped dt-responsive table-bordered border-collapse" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Active</th>
                                    <th>Opertions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($favicons as $fav)
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('storage/app')}}/{{$fav->image}}" alt="" width="100px" height="100px">
                                        </td>
                                        <td>
                                            @if ($fav->active == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <form action="{{URL::to('/admin/system-settings/logo-favicon/active')}}/{{$fav->id}}" method="post">
                                                    <input type="checkbox" name="active" value="1" class="formSubmitJq">
                                                </form>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{URL::to('admin/system-settings/logo-favicon/update')}}/{{$fav->id}}" class="btn btn-primary btn-sm">Update</a>
                                            @if ($fav->active != 1)
                                                <a href="{{URL::to('admin/system-settings/logo-favicon/delete')}}/{{$fav->id}}" class="btn btn-danger btn-sm deleteAlert">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
