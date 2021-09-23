@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/newsLetter')}}">NewsLetter</a></li>
    <li class="breadcrumb-item active" aria-current="page">Send Mail</li>
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
                    <h4>All Send Mail</h4>
                    <a href="{{URL::to('admin/newsLetter/send-mail/add')}}" class="btn btn-primary btn-sm">Send Mail</a>
                </div><br>
                <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($totalData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->subject}}</td>
                                <td>{{$data->message}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
</form>
@endsection
