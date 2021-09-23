@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/system-settings/main-slider')}}">Main Slider</a></li>
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
            <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                <label for=""> Heading 1 </label>
                <input type="text" name="h1" class="form-control mb-2" required>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                <label for=""> Heading 2 </label>
                <input type="text" name="h2" class="form-control mb-2" required>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-12">
                <label for=""> Heading 3 </label>
                <input type="text" name="h3" class="form-control mb-2" required>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                <label for=""> Image </label>
                <input type="file" name="image" class="form-control mb-2">
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                <label for=""> Description </label>
                <textarea name="description" id="" class="form-control mb-2"></textarea>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Button 1 Title </label>
                <input type="text" name="link1title" class="form-control mb-2" required>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Button 1 link </label>
                <input type="text" name="link1" class="form-control mb-2" required>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Button 2 Title </label>
                <input type="text" name="link2title" class="form-control mb-2" required>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Button 2 link </label>
                <input type="text" name="link2" class="form-control mb-2" required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Save">
    </form>

@endsection
