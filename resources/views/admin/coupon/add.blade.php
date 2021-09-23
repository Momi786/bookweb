@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/admin/coupon')}}">Coupon</a></li>
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
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Coupon Code</label>
                <input type="text" name="code" class="form-control" required>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Discount Rate  </label>
                <input type="number" name="discount" class="form-control mb-2" required>     
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Expire Limit</label>
                <input type="number" name="userLimit" id="expire1" class="form-control">
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 col-12">
                <label for=""> Expire Date  </label>
                <input type="date" name="endDate" id="expire2" class="form-control mb-2">
            </div>
        </div><br>
        <input type="submit" id="myform" class="btn btn-primary" value="Save">
        <p id="error" class="text-danger mt-2"></p>
    </form>

<script>
    document.getElementById("myform").addEventListener("click", function(event){
        var expire1 = document.getElementById("expire1").value;
        var expire2 = document.getElementById("expire2").value;
        if(expire1 == "" && expire2 == ""){
            document.getElementById("error").innerHTML = "Both Expired Flied is empty Please Fill Atleast one of them.";
            event.preventDefault()
        }
    });
</script>
@endsection
