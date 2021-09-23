@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item active" aria-current="page">News</li>
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
                    <h4>All News</h4>
                    <a href="{{URL::to('admin/news/add')}}" class="btn btn-primary btn-sm">Add New</a>
                </div><br>
                <p class="text-right">
                    <button type="submit" name="submit" value="delete" class="btn btn-icon btn-rounded text-danger mb-2 p-2"><i class="fa fa-trash"></i></button>
                </p>
                <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            @if($value['usertype'] != 2)
                                <th>Author</th>
                            @endif
                            <th>Status</th>
                            <th>Opertions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalNews as $data)
                        @php
                            $Author = $data->GetAuthor();
                        @endphp
                            <tr>
                                <td>
                                    <input type="checkbox" name="feature[]" value="{{$data->id}}">
                                    {{$data->id}}
                                </td>
                                <td>{{$data->newsTitle}}</td>
                                @if ($value['usertype'] != 2)
                                    <td>{{isset($Author) ? $Author->name : ''}}</td>
                                @endif
                                <td>
                                    @if ($data->pending == 1)
                                        @if ($value['usertype'] != 2)
                                            <a href="{{URL::to('admin/news/allow')}}/{{$data->id}}" class="btn btn-warning btn-sm">Allow</a>
                                        @else
                                            <p class="text-warning">Pending</p>
                                        @endif
                                    @else
                                        <p class="text-success">Active</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{URL::to('admin/news/update')}}/{{$data->id}}" class="btn btn-primary btn-sm">Update</a>
                                    <a href="{{URL::to('admin/news/delete')}}/{{$data->id}}" class="btn btn-danger btn-sm deleteAlert">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
</form>
@endsection
