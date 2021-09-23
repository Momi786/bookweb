@include ('web/include/header')

<div class="container mt-4">

<section class=" mt-5">
   <div class="row">
      <div class="col-md-12 col-md-12 text-center">
        <div class="d-flex justify-content-between">
            <h4>All Orders</h4>
        </div><br>
        <table id="myTable" class="table table-striped table-bordered nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Total Products</th>
                    <th>Order Price</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($totalData as $data)
                @php
                    $Products = $data->GetProducts();
                    $User = $data->GetUser();
                @endphp
                    <tr>
                        <td>
                            {{$data->id}}
                        </td>
                        <td>{{$User->firstName}} </td>
                        <td>{{count($Products)}}</td>
                        <td>${{$data->totalPrice}}</td>
                        <td>
                            @if ($data->status == 1)
                                <p class="text-success">Deliver</p>
                            @else
                                <p class="text-warning">Pending</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('order-detail')}}/{{$data->id}}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
   </div>
</section>




@include ('web/include/footer')

