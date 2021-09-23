@include ('web/include/header')

<div class="container mt-4">

<section class=" mt-5">
   <div class="row">
      <div class="col-md-12 col-md-12 text-center">
        <div class="d-flex justify-content-between">
            <h4>Order Detail</h4>
        </div><br>
        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Products</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                @php    $sr=1   @endphp
                @foreach($totalData as $data)
                @php
                    $Products = $data->GetDetail();
                @endphp
                    <tr>
                        <td>
                            {{$sr++}}
                        </td>
                        <td>{{$Products->name}}</td>
                        <td>{{$data->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
   </div>
</section>




@include ('web/include/footer')
