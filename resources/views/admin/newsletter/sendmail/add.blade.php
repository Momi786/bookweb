@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/newsLetter')}}">NewsLetter</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/newsLetter/send-mail')}}">Send Mail</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
            <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <div class="d-flex justify-content-between">
        <h4>Send Mail To our Subscribers</h4>
    </div><br>
    <form action="" method="post">
        <label for="">Subject</label>
        <input type="text" name="subject" class="form-control" required>
        <label for="">Message</label>
        <textarea name="message" class="form-control"></textarea><br>
        <input type="submit" class="btn btn-primary btn-sm" value="Send">
    </form>

@endsection
