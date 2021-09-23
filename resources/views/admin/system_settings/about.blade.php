@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">About Page Content</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif

    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
        <div class="col-md-12 mb-2">
            <h4 >About Page Content</h4>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <textarea name="editor1" class="form-control">
                    @php
                        $desc = html_entity_decode($data->description);
                        echo $desc;
                    @endphp
                </textarea>
                <input type="hidden" name="name" value="{{$data->name}}"><br>
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>


@endsection

