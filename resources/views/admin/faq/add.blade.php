@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/faq')}}">FAQ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
            <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <label for=""> Question </label>
                <input type="text" name="ques" class="form-control" required>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <label for=""> FAQ Category</label>
                <select name="categoryId" class="form-control" required>
                    @foreach($FAQCategory as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <label for=""> Answer</label>
                <textarea name="ans" class="form-control pt-2"></textarea>
            </div>
        </div><br/>

        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
