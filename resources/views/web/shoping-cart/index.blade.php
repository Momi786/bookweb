@include ('web/include/header')

    <section>
    <div class="cart-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-12 cart-heading">
                <h1>Shoping Cart</h1>
            </div>
          </div>
        </div>

    </div>

    </section>

    <div class="container mt-6">



<section class="">
<div class="alert alert-danger errorAjax"></div>
<div class="shopping-cart">

<div class="column-labels">
  <label class="product-image">Image</label>
  <label class="product-details">Product</label>
  <label class="product-quantity">Quantity</label>
  <label class="product-price">Price</label>
  <label class="product-line-price">Total</label>
</div>
@foreach($cartOld as $car)
  @php
    $book = $car->GetBook();
    $SaleData = $book->GetSaleData();
    if($SaleData == "error"){
      $price = $book->price;
    }else{
      $saleper = ($book->price/100)*$SaleData->salePercent;
      $price = $book->price - $saleper;
    }
  @endphp
  <div class="product">
    <div class="product-image">
      <img src="{{URL:: to('storage/app')}}/{{$book->cover_image}}" class="img-fluid mr-3">
    </div>
    <div class="product-details">
      <div class="product-title">{{$book->name}}</div>
      <p class="product-description">{{$book->description}}</p>
    </div>
    <div class="product-quantity">
      <input type="number" class="border-0 quantityFlied" tableId="{{$car->id}}" value="{{$car->quantity}}" min="1">
    </div>
    <div class="product-price pricePerUnit">{{$price}}</div>
    <div class="product-line-price totalData">{{$price * $car->quantity}}</div>
  </div>
@endforeach

    <div class="row">
      <div class="col-md-6">
        <form action="{{URL::to('/coupon-apply')}}" method="post">
          <p class="text-danger">
            @php
              if(Session::has('error')){
                echo Session::get('error');
              }
            @endphp
          </p>
          <div class="d-flex">
              <div class="form-input mr-3">
                <input type="text" name="couponCode" class="form-control" placeholder="Enter Code Here">
              </div>
              <button class="btn btn-coupan">APPLY COUPAN</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
      <div class="totals">
  <div class="totals-item">
    <label>Subtotal</label>
    <div class="totals-value subTotal" id="cart-subtotal">71.97</div>
  </div>
  <div class="totals-item">
    <label>Tax (5%)</label>
    <div class="totals-value tax" id="cart-tax">3.60</div>
  </div>
  <div class="totals-item">
    <label>Shipping</label>
    <div class="totals-value shipping" id="cart-shipping">15.00</div>
  </div>
  <div class="totals-item">
    <label>Discount %</label>
    @php
      if(Session::has('couponApplySuccess')){
        $dicountPerct = Session::get('couponApplySuccess');
      }else{
        $dicountPerct = 0;
      }
    @endphp
    <div class="discountPercant" style="text-align: right;">{{$dicountPerct}}</div>
  </div>
  <div class="totals-item totals-item-total">
    <label>Grand Total</label>
    <div class="totals-value GrandTotal" id="cart-total">90.57</div>
  </div>
</div>
      </div>
    </div>


</div>
<form action="{{URL::to('saveOrder')}}" id="CheckoutForm" method="post">
      <input type="hidden" name="grandPrice" id="totalGrandPrice">
</form>
<div class="d-flex justify-content-end mt-3">
    <button class="btn btn-checkout mr-3">Continue Shoping</button>
    <button class="btn btn-checkout CheckoutFormBtn">Process to checkout</button>
    </div>
</section>


@include ('web/include/footer')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script>
$(".CheckoutFormBtn").on('click',function(){
  var amountFinel = $(".GrandTotal").text();
  console.log(amountFinel);
  $("#totalGrandPrice").val(amountFinel);
  $("#CheckoutForm").submit();
})
  $(".errorAjax").hide();
  function GrandTotal(){
    var subTotal = 0;
    $(".totalData").each(function() {
      var num2 = $(this).html();
      subTotal = +subTotal + +num2
    });
    subTotal = (Math.round(subTotal * 100) / 100).toFixed(2);
    var taxFloat = (subTotal/100)*5;
    var tax = (Math.round(taxFloat * 100) / 100).toFixed(2);
    $(".subTotal").html(subTotal);
    $(".tax").html(tax);
    var shipping = $(".shipping").html();
    var discount = $(".discountPercant").html();
    var GrandTotal = +subTotal + +tax + +shipping;
    GrandTotal = (Math.round(GrandTotal * 100) / 100).toFixed(2);
    var DiscountPrice = GrandTotal * discount / 100;
    var FinalTotal = GrandTotal - DiscountPrice;
    $(".GrandTotal").html(FinalTotal);
  }
  GrandTotal();

  $(function() {
    $(".quantityFlied").on("change",function(){
      var tableId = $(this).attr("tableId");
      var value = $(this).val();
      var price = $(this).parent().parent().find(".pricePerUnit").html();
      var url = "{{URL::to('CartQuantity')}}" + "/" + tableId;
      if (value > 0) {
        var totalData = +price * +value;
        totalData = (Math.round(totalData * 100) / 100).toFixed(2)
        $(this).parent().parent().find(".totalData").html(totalData);
        $(function() {
          $.ajax({
            type: "POST",
            url: url,
            data:{value : value},
            success: function(data){
              if (data[0] == "error") {
                $(".errorAjax").html(data[1]);
                $(".errorAjax").show();
              }else{
                console.log(price);
                GrandTotal();
              }
            }
          });
        });
      }else{
        $(".errorAjax").html("Quantity must be more than zero.");
        $(".errorAjax").show();
        setTimeout(function(){ $(".errorAjax").hide();$(".errorAjax").html(""); }, 10000);
      }
    });
  });
</script>

