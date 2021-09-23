@include ('web/include/header')

    <section>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="{{URL::to('/all-book')}}">Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$BookDetail->name}}</li>
                    </ol>
                </nav>

            </div>
        </div>
    </div>
    </section>
    <section>
        <div class="container mt-5">
            <div class="row">
            <div class="col-md-3 col-sm-12 col-12">
                <div class="book-detail-img">
                    <img src="{{URL::to('storage/app')}}/{{$BookDetail->cover_image}}" class="" alt="" style="width:254px;">
                </div>
            </div>
            <div class="col-md-9 col-sm-12 col-12">
                <div>
                    <h2 class="font-weight-800">{{$BookDetail->name}}</h2>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex mt-2">
                        <div>
                            <div class="mt-2" style="color:khaki">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div style="padding: 7px 0px 0px 5px;">
                            <span class="font-weight-800 mr-3">4.0</span>
                            <span class="mr-3"><i class="fas fa-comments text-primary mr-2"></i>20</span>
                            <span><i class="fas fa-thumbs-up text-primary mr-2"></i>20</span>
                        </div>

                    </div>
                    <div class="mb-2">
                        <div class="d-flex justify-content-center mt-3">
                            <a href="https://facebook.com/sharer/sharer.php?u={{URL::current()}}" class="btn btn-facebook mr-2 text-white"><i class="fab fa-facebook-f mr-3"></i>Facebook</a>
                            <a href="https://twitter.com/intent/tweet?url={{URL::current()}}" class="btn btn-twitter mr-2 text-white"><i class="fab fa-twitter mr-3"></i>Twitter</a>
                            <a href="https://plus.google.com/share?url={{URL::current()}}" class="btn btn-google text-white"><i class="fab fa-google-plus-g mr-3"></i>Google+</a>


                        </div>
                    </div>

                </div>
                <div>
                   @php
                       $description = html_entity_decode($BookDetail->detailDescription);
                       echo $description;
                   @endphp
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="d-flex">
                            <div class="media mr-5">
                                <i class="fas fa-shield-alt i-color1"></i>
                                <div class="media-body">
                                <p class="mb-0 p-color">Dispaly Name</p>
                            <p class="text-color">
                                <strong>Name</strong>
                            </p>
                                </div>
                            </div>
                            <div class="media-body">
                            <p class="mb-0 p-color">Publisher</p>
                            <p class="text-color">
                                <strong>Name</strong>
                            </p>
                            </div>
                            <div class="media-body">
                            <p class="mb-0 p-color">Year</p>
                            <p class="text-color">
                                <strong>2019</strong>
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-ship mr-2"><i class="fas fa-bolt mr-3"></i>Free Shipping</button>
                                <button class="btn btn-{{$BookDetail->stock < 10 ? 'stock-danger' : 'stock' }} mr-2"><i class="fas fa-shield-alt mr-3"></i>In Stocks</button>

                            </div>
                    </div>

                </div>
                <div class="row top-border pt-4">
                    <div class="col-sm-12 col-md-6 col-12">
                        <div class="d-flex">
                            <h1 class="mr-3">{{$BookDetail->price}}</h1>
                            <p class="mt-2 mr-5"><s>$15.63</s></p>
                                <div class="red mt-2">
                                    <span>2%</span>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-12">
                        <div class="d-flex justify-content-end">
                                <button class="btn btn-purple mr-2 AddToCart"  productid="{{$BookDetail->id}}" onclick="alert('Your cart update succesfully');" ><i class="fas fa-cart-plus mr-3 "></i>Add to Cart</button>
                            
                            <span class="icon-border"><i class="far fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>




    </section>

    <section class="mt-5">
        <div class="container">
            <div class="row">
            <div class="col-md-9">
                <div class="d-flex">
                    <h2 class="mr-5" style="color:#ababab;">Detail Product</h2>
                    <h2>Customer Reviews</h2>
                </div>
                <div class="row border p-3 mt-3">
                    <div class="col-md-4">
                        <div>
                            <h3>Rang Information</h3>
                            <p style="font-size: 14px;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequuntur, aspernatur?
                    </div>

                </div>
                <div class="col-md-4">
                <?php
               for ($i = 0; $i < 5; $i++):
               ?>
                    <div class="d-flex pt-2">
                        <span class="mr-3" style="font-size:10px"><i class="fas fa-star mr-2 star-red"></i>5</span>
                        <div class="col1 pt-1">
                            <div class="meter" style="width: 136px;">
                                <span style="width: 50%;"></span>
                            </div>

                        </div>
                        <span class="ml-3" style="font-size:10px">86%</span>
                    </div>
            <?php endfor;?>

                    </div>
                    <div class="col-md-4 text-center pt-5">
                        <div class="d-flex justify-content-center">
                            <h2 class="mr-4">4.7</h2> <span class="mt-2">out of 5</span>
                        </div>
                    <div class="mt-2 star-red">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    </div>

            </div>
            <div class="d-flex justify-content-between mt-4">
                <h6>Showing 4 of 20 reviews</h6>
                <div>
                    <span class="">Newest<i class="fas fa-chevron-down ml-2"></i></span>
                </div>
            </div>
            <?php
               for ($i = 0; $i < 5; $i++):
               ?>
            <div class="border p-4 mt-4">
                <div class="media mr-5">
                                <i class="fas fa-shield-alt i-color1"></i>
                                <div class="media-body">
                                <p class="mb-0 p-color">Dispaly Name</p>
                            <p class="text-color">
                                <strong>Nmae</strong>
                            </p>
                                </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum enim dicta explicabo iste tempora, eveniet placeat. Quidem magnam doloremque </p>
                    </div>
                    <div class="col-md-3">
                    <span>
                        <h3 class="star-red">4.7</h3>
                    <div class="mt-2 star-red">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    </span>
                    </div>


                </div>
            </div>
            <?php endfor;?>
                <div class="show-btn mt-3">
                        <button class="btn btn-view">View More</button>
                </div>
        </div>
        <div class="col-md-3"></div>
        </div>
    </section>

<section class="mt-5">
    <div class="bg-light p-4">
        <div class="container">
        <div class="row">
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fas fa-bolt i-color"></i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>Display Name</strong>
               </p>
               <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
            </div>
         </div>
      </div>
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fas fa-shield-alt i-color"></i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>Display Name</strong>
               </p>
               <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
            </div>
         </div>
      </div>
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fas fa-thumbs-up i-color"></i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>Display Name</strong>
               </p>
               <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
            </div>
         </div>
      </div>
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fas fa-star i-color"></i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>Display Name</strong>
               </p>
               <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
            </div>
         </div>
      </div>
   </div>
        </div>
    </div>
</section>

    <section class="mt-5">
   <div class="container">
   <div class="row">
      <div class="col-md-12">
         <h2 class="text-title">Book On Sale</h2>
         <div class="owl-carousel owl-theme owl3 mt-3">
            <?php
               for ($i = 0; $i < 10; $i++):
               ?>
            <div class="m-2">
               <div class="">
                  <figure class="figure tag tag-featured mb-0">
                     <img src="{{URL::to('public/assests/img/book.jpg')}}" alt="featured image" class="figure-img">
                  </figure>
                  <div class="card-body border-0 p-0">
                     <h6 class="card-title text-color mb-0" style="text-align: initial;">The Misadventure of.</h6>
                     <p class="text-blue" style="text-align: initial; font-size:13px;">Adventural,Survival</p>
                     <div class="d-flex justify-content-between">
                        <span class="star-color"><i class="fas fa-star mr-1"></i>4.7</span>
                        <div class="d-flex">
                           <span class="mr-2 text-dark">$20</span>
                           <span class="text-dull"><s>$20</s></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php endfor;?>
         </div>
      </div>
   </div>
   </div>
</section>















@include ('web/include/footer')


<script>
     $('.owl3').owlCarousel({
    loop:true,
   margin:10,
   nav:false,
   dots:false,
   navText : ["<i class='fas fa-long-arrow-alt-left font-offer mr-3'></i>","<i class='fas fa-long-arrow-alt-right font-offer'></i>"],
   responsive:{
    0:{
        items:1
    },
    600:{
        items:1
    },
    1000:{
        items:6
    }
   }

   });
</script>
