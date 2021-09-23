@include ('web/include/header')
<!-- content body -->
<!-- slider section -->
<div class="container mt-4">
<section class="">
   <div class="row">
      <div class="col-sm-12 col-md-9">
         <div class="owl-carousel owl-theme owl4 ">
            @foreach ($MainSlider as $slider)

                <div class="bg-back">
                <div class="urlImage">
                    <div class="row">
                        <div class="col-md-6">
                        <div style="padding: 61px 0 0 26px;">
                        <h5>{{$slider->h1}}</h5>
                        <h1 class="text-black">{{$slider->h2}}</h1>
                        <h4 class="text-black">{{$slider->h3}}</h4>
                        <p class="text-black pt-3">{{$slider->description}}</p>
                        <div class="d-flex">
                            <a href="{{$slider->link1}}" class="btn btn-ligh1 mr-3">{{$slider->link1title}} <i class="fas fa-long-arrow-alt-right ml-3"></i></a>
                            <a href="{{$slider->link2}}" class="btn btn-ligh1">{{$slider->link2title}}</a>

                        </div>
                    </div>

                        </div>
                    </div>

                    </div>
                </div>
            @endforeach
         </div>
      </div>
      <div class="col-sm-12 col-md-3">
         <div class="mini-slide">
            <div class="best-seller">
               <h3>Best Seller</h3>
               <p>Based Sales this Week</p>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img class="d-block " src="{{URL::to('public/assests/img/book.jpg')}}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="{{URL::to('public/assests/img/book.jpg')}}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                     <img class="d-block" src="{{URL::to('public/assests/img/book.jpg')}}" alt="Third slide">
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- delievery Section -->
<section class="mt-5">
   <div class="row">
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fa i-color">@php echo "&#x".$HomeContent[0]->link.";"; @endphp</i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>{{$HomeContent[0]->title}}</strong>
               </p>
               <p class="p-color">{{$HomeContent[0]->description}}</p>
            </div>
         </div>
      </div>
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fa i-color">@php echo "&#x".$HomeContent[1]->link.";"; @endphp</i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>{{$HomeContent[1]->title}}</strong>
               </p>
               <p class="p-color">{{$HomeContent[1]->description}}</p>
            </div>
         </div>
      </div>
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fa i-color">@php echo "&#x".$HomeContent[2]->link.";"; @endphp</i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>{{$HomeContent[2]->title}}</strong>
               </p>
               <p class="p-color">{{$HomeContent[2]->description}}</p>
            </div>
         </div>
      </div>
      <div class="col-md-3 col-sm-12">
         <div class="media">
            <i class="fa i-color">@php echo "&#x".$HomeContent[3]->link.";"; @endphp</i>
            <div class="media-body">
               <p class="mb-0 text-color">
                  <strong>{{$HomeContent[3]->title}}</strong>
               </p>
               <p class="p-color">{{$HomeContent[3]->description}}</p>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- Banner Section -->
<section class="mt-5">
   <div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <a href="{{$HomeContent[16]->link}}">
            <img src="{{URL::to('storage/app')}}/{{$HomeContent[16]->title}}" alt="">
        </a>
    </div>
   </div>
</section>



<!-- recomended Section -->
      <section class="mt-5">
         <div class="row">
            <div class="col-md-6">
                <div class="bg-pink p-4">
                    <h4>{{$HomeContent[4]->title}}</h4>
                    <p>{{$HomeContent[4]->description}}</p>
                    <div class="owl-carousel owl-theme owl5">
                        @foreach ($recommdedAllBook as $recommdedAll)
                            <div class="item m-3">
                                <div class="card5">
                                    <a href="{{URL::to('book-detail')}}/{{$recommdedAll->id}}">
                                        <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$recommdedAll->cover_image}}" alt="Card image cap" style="height: 118px;object-fit:cover">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-blue p-4">
                    <h4>{{$HomeContent[5]->title}}</h4>
                    <p>{{$HomeContent[5]->description}} </p>
                    <div class="owl-carousel owl-theme owl5">
                        @foreach ($recommdedOnlyBook as $recommdedOnly)
                            <div class="item m-3">
                                <div class="card5">
                                    <a href="{{URL::to('book-detail')}}/{{$recommdedOnly->id}}">
                                        <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$recommdedOnly->cover_image}}" alt="Card image cap" style="height: 118px;object-fit:cover">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
         </div>
      </section>
<!-- offer section -->
<section class=" mt-5">
   <div class="row">
      <div class="col-md-12 col-md-12 text-center">
         <h2 class="text-color">{{$HomeContent[6]->title}}</h2>
         <p>{{$HomeContent[6]->description}} </p>
         <div class="owl-carousel owl-theme owl1">
            @foreach ($SpecialOfferBooks as $special)
                @php
                    $OB = $special->GetBook();
                    $category = $OB->GetCategory();
                    $author = $OB->GetAuthor();
                @endphp
                <div class="item m-3">
                    <div class="card">
                        <a href="{{URL::to('book-detail')}}/{{$OB->id}}">
                            <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$OB->cover_image}}" alt="Card image cap" style="object-fit: contain">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-color" style="text-align: initial; font-size:initial">{{$OB->name}}</h5>
                            <div class="text-left mb-3">
                                <span class="badge badge-purple">{{$category->description}}</span>
                                {{-- <span class="badge badge-purple">THTILLER</span>
                                <span class="badge badge-purple">HORROR</span> --}}
                            </div>
                            <p class="card-text">{{$OB->description}}</p>
                            <h6 style="text-align: initial;">{{$author->name}}</h6>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-purple AddToCart" onclick="alert('Your cart update succesfully');" productid="{{$OB->id}}"><i class="fas fa-cart-plus mr-3 "></i>Add to Cart</button>
                                <div class="d-flex">
                                    @php
                                        $saleper = ($OB->price/100)*$special->salePercent;
                                        $saleprice = $OB->price - $saleper;
                                    @endphp
                                    <span class="mr-2 font-weight-bolder">
                                        <h5>${{$saleprice}}</h5>
                                    </span>
                                    <span class="text-dull"><s>${{$OB->price}}</s></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
         </div>
      </div>
   </div>
</section>
<!-- timer section -->
@if ($FlashSaleBooks)

    <section class=" mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-color">
                    {{$HomeContent[7]->title}}
                </h2>
                <p>{{$HomeContent[7]->description}} </p>
                <div id="countdown">
                    <ul class="mb-0">
                        <li>
                            <span id="days"></span>
                            <p>days</p>
                        </li>
                        <li>
                            <span id="hours"></span>
                            <p>Hours</p>
                        </li>
                        <li>
                            <span id="minutes"></span>
                            <p>Minutes</p>
                        </li>
                        <li>
                            <span id="seconds"></span>
                            <p>Seconds</p>
                        </li>
                    </ul>
                </div>
                <div class="owl-carousel owl-theme owl2 mt-3">
                    @foreach ($FlashSaleBooks as $flashBook)
                        @php
                            $fB = $flashBook->GetBook();
                            $author = $fB->GetAuthor();
                        @endphp

                        <div class="item m-3">
                            <div class="">
                                <a href="{{URL::to('book-detail')}}/{{$fB->id}}">
                                    <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$fB->cover_image}}" alt="Card image cap" style="height: 235px">
                                </a>
                                <div class="card-body border-0">
                                    <h5 class="card-title text-color mb-0" style="text-align: initial;font-size: inherit;">{{$fB->name}}</h5>
                                    <p class="text-blue">{{isset($author) ? $author->name : ''}}</p>
                                    <div class="d-flex justify-content-center">
                                        @php
                                            if(isset($fB)){
                                                $saleper = ($fB->price/100)*$flashBook->salePercent;
                                                $saleprice = $fB->price - $saleper;
                                            }
                                        @endphp
                                        <span class="mr-2 text-blue">
                                            <h5>${{$saleprice}}</h5>
                                        </span>
                                        <span class="text-dull"><s>${{$fB->price}}</s></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!-- book on sale offer -->
<section class="mt-5">
   <div class="row">
      <div class="col-md-12">
         <h2 class="text-title">Book On Sale</h2>
         <div class="owl-carousel owl-theme owl3 mt-3">
            @foreach ($AllSale as $sale)
                @php
                    $book = $sale->GetBook();
                    $category = $book->GetCategory();
                @endphp
                <div class="m-2">
                    <div class="">
                        <figure class="figure tag tag-featured mb-0">
                            <a href="{{URL::to('book-detail')}}/{{$book->id}}">
                                <img src="{{URL::to('storage/app')}}/{{isset($book) ? $book->cover_image : ''}}" alt="featured image" class="figure-img" height="225px">
                            </a>
                        </figure>
                        <div class="card-body border-0 p-0">
                            <h6 class="card-title text-color mb-0" style="text-align: initial; font-size:inherit;">{{isset($book) ? $book->name : ''}}</h6>
                            <p class="text-blue" style="text-align: initial; font-size:13px;">{{isset($category) ? $category->name : ''}}</p>
                            <div class="d-flex justify-content-between">
                                <span class="star-color  "><i class="fas fa-star mr-1"></i>4.7</span>
                                <div class="d-flex">
                                    @php
                                        if(isset($book)){
                                            $saleper = ($book->price/100)*$sale->salePercent;
                                            $saleprice = $book->price - $saleper;
                                        }
                                    @endphp
                                    <span class="mr-2 text-dark">${{$saleprice}}</span>
                                    <span class="text-dull"><s>${{$book->price}}</s></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
         </div>
      </div>
   </div>
</section>
<!-- featured Background -->
@if (count($featuredBook) > 0)

<section class="mt-5 featured-back">
   <div class="row">
      <div class="col-md-12">
         <div class="row pt-3 pb-3">
            <div class="col-md-6">
                <div class="p-100">
                    <h5>{{$HomeContent[8]->title}}</h5>
                    <p>{{$HomeContent[8]->description}} </p>
                </div>
                <div class="box-white">
                    <div class="tab-content">
                        @for ($i = 0; $i < count($featuredBook); $i++)
                            @php
                                $category = $featuredBook[$i]->GetCategory();
                                $author = $featuredBook[$i]->GetAuthor();
                            @endphp
                            <div class="tab-pane {{$i == 0 ? 'active' : ''}}" id="tabs-{{$i}}" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-5 feature-img">
                                        <a href="{{URL::to('book-detail')}}/{{$featuredBook[$i]->id}}">
                                            <img src="{{URL::to('storage/app')}}/{{$featuredBook[$i]->cover_image}}" class="imh-fluid m-3" alt="" style="width: 204px; height: 291px;border-radius:13px;object-fit:cover">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="media p-2">
                                            <i class="far fa-bookmark i-color1 mr-2 bg-none"></i>
                                            <div class="media-body">
                                                <p class="mb-0 text-color">
                                                    <strong>{{$featuredBook[$i]->name}}</strong>
                                                </p>
                                                <p class="p-color">{{$category->name}}</p>
                                            </div>
                                        </div>
                                        <div class="card4">

                                            <div class="card-body border-0">
                                                {{-- <h5 class="card-title text-color" style="text-align: initial;">SECONDS</h5> --}}

                                                <p class="card-text">@php echo $featuredBook[$i]->description @endphp</p>
                                                <h6 style="text-align: initial;">{{$author->name}}</h6>
                                                <div class="d-flex justify-content-between">
                                                    <button class="btn btn-purple AddToCart" onclick="alert('Your cart update succesfully');" productid="{{$featuredBook[$i]->id}}"><i class="fas fa-cart-plus mr-3 "></i>Add to Cart</button>
                                                    <div class="d-flex">
                                                    <span class="mr-2 font-weight-bolder">
                                                        <h5>${{$featuredBook[$i]->price}}</h5>
                                                    </span>
                                                    {{-- <span class="text-dull"><s>$20</s></span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-md-6">
               <ul class="row p-3 nav nav-tabs border-0" role="tablist">
                  <?php
                     for ($i = 0; $i < count($featuredBook); $i++):
                     ?>
                  <li class="col-md-4 col-sm-6 col-6 nav-item">
                    <a class="nav-link {{$i==0 ? 'active' : ''}}" data-toggle="tab" href="#tabs-{{$i}}" role="tab"><img src="{{URL::to('storage/app')}}/{{$featuredBook[$i]->cover_image}}" class="imh-fluid p-2" alt="" style="width: 130px; height: 225px;border-radius:13px;"></a>
                  </li>
                  <?php endfor;?>
                </ul>
            </div>
         </div>
      </div>
   </div>
</section>
@endif
<!-- testimonial Section -->
<section>
   <div class="testimonials-clean">
      <div class="">
         <div class="intro">
            <h2 class="text-center">{{$HomeContent[9]->title}} </h2>
            <p class="text-center">{{$HomeContent[9]->description}}</p>
         </div>
         <div class="row people">
            <div class="owl-carousel owl-theme owl6">
                @foreach ($totalTestimonial as $totaltest)

                    <div class="item">
                        <div class="box">
                            <p class="description">{{$totaltest->description}}</p>
                        </div>
                        <div class="author">
                            <img class="rounded-circle" src="{{URL::to('storage/app')}}/{{$totaltest->image}}">
                            <h5 class="name">{{$totaltest->title}}</h5>
                            <p class="title">{{$totaltest->designation}}</p>
                        </div>
                        <div style="position:absolute;bottom: 74px;right: 20px; color:khaki">
                            @for ($i = 0; $i < $totaltest->rating; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
      </div>
   </div>
</section>
<!-- news section -->
<section class="mt-5">
   <div class="row">
      <div class="col-md-12">
         <h2>{{$HomeContent[10]->title}}</h2>
         <div class="d-flex justify-content-between mt-3 latest-news">
            <p class="mb-0">{{$HomeContent[10]->description}}</p>
            <p align="right">
               <a href="{{URL::to('/news')}}">
                <button class="btn btn-purple1">View More<i class="fas fa-long-arrow-alt-right ml-4"></i></button>
               </a>
            </p>
         </div>
      </div>
      @foreach ($allNews as $news)
        @php
            $author = $news->GetAuthor();
        @endphp
        <div class="col-md-3 mt-5">
            <div class="card1">
                <a href="{{URL::to('/single-blog')}}/{{$news->id}}">
                    <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$news->newsImg}}" alt="Card image cap">
                </a>
                <div class="card-body1 mt-4">
                    <h5 class="card-title text-color" style="text-align: initial;font-size: 13px;
                        font-weight: 700;">{{$news->newsTitle}}</h5>
                    <p class="card-text">{{$news->shotDes}}</p>
                    <div class="media">
                        <a href="{{URL::to('author-profile')}}/{{$author->id}}">
                            <img class="rounded-circle" src="{{URL::to('storage/app')}}/{{$author->image}}">
                        </a>
                        <div class="media-body">
                            <p class="mb-0 text-color">
                                <strong>{{$author->name}}</strong>
                            </p>
                            @php
                                $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                $timeDate2 = strtotime($news->created_at->format("Y-m-d H:i:s"));
                                $minsDate = ($timeDate1 - $timeDate2) / 60/60/24;
                                $minsDate = intval($minsDate);
                            @endphp
                            <p class="p-color">{{$minsDate}} Days Ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
   </div>
</section>
<!-- happy customeer section -->
<section class="mt-5">
   <div id="projectFacts" class="sectionClass">
      <div class="fullWidth eight columns">
         <div class="projectFactsWrap ">
            <div class="item wow fadeInUpBig animated animated" data-number="12" style="visibility: visible;">
               <i class="fa mb-5">@php echo "&#x".$HomeContent[12]->link.";"; @endphp</i>
               <p id="number1" class="number">{{count($happyCustomer)}}</p>
               <h3>{{$HomeContent[12]->title}}</h3>
            </div>
            <div class="item wow fadeInUpBig animated animated" data-number="55" style="visibility: visible;">
               <i class="fa mb-5">@php echo "&#x".$HomeContent[13]->link.";"; @endphp</i>
               <p id="number2" class="number">{{count($allBooks)}}</p>
               <h3>{{$HomeContent[13]->title}}</h3>
            </div>
            <div class="item wow fadeInUpBig animated animated" data-number="359" style="visibility: visible;">
               <i class="fa mb-5">@php echo "&#x".$HomeContent[14]->link.";"; @endphp</i>
               <p id="number3" class="number">{{count($allAuthor)}}</p>
               <h3>{{$HomeContent[14]->title}}</h3>
            </div>
            <div class="item wow fadeInUpBig animated animated" data-number="246" style="visibility: visible;">
               <i class="fa mb-5">@php echo "&#x".$HomeContent[15]->link.";"; @endphp</i>
               <p id="number4" class="number">{{count($allAuthor)}}</p>
               <h3>{{$HomeContent[15]->title}}</h3>
            </div>
         </div>
      </div>
   </div>
</section>

@include ('web/include/footer')
<script>
   $('.owl1').owlCarousel({
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
        items:3
    }
   }
   });


   $('.owl2').owlCarousel({
    loop:true,
   margin:10,
   nav:true,
   nav:false,
   dots:false,
   responsive:{
    0:{
        items:1
    },
    600:{
        items:1
    },
    1000:{
        items:5
    }
   }
   });


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
   $('.owl4').owlCarousel({
    loop:true,
   margin:10,
   dots:false,
   nav:false,
   navText : ["<i class='fas fa-long-arrow-alt-left font-offer mr-3'></i>","<i class='fas fa-long-arrow-alt-right font-offer'></i>"],
   responsive:{
    0:{
        items:1
    },
    600:{
        items:1
    },
    1000:{
        items:1
    }
   }

   });
   $('.owl5').owlCarousel({
    loop:true,
   margin:10,
   dots:false,
   nav:false,

   navText : ["<i class='fas fa-long-arrow-alt-left'></i>","<i class='fas fa-long-arrow-alt-right'></i>"],
   responsive:{
    0:{
        items:2
    },
    600:{
        items:2
    },
    1000:{
        items:4
    }
   }

   });
   $('.owl6').owlCarousel({
    center: true,
    loop:true,
   dots:false,
    margin:10,
      responsive:{
         0:{
            items:1
         },
         600:{
            items:1
         },
         1000:{
            items:2
         }
      }
   });
</script>
@if ($FlashSaleBooks)

    <script>
        (function () {
            const second = 1000,
                minute = second * 60,
                hour = minute * 60,
                day = hour * 24;

            let birthday = "{{date('M d, Y H:i:s',strtotime($FlashSaleTime[0]->endTime))}}",
            countDown = new Date(birthday).getTime(),
            x = setInterval(function() {

                let now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                let headline = document.getElementById("headline"),
                    countdown = document.getElementById("countdown"),
                    content = document.getElementById("content");

                headline.innerText = "It's my birthday!";
                countdown.style.display = "none";
                content.style.display = "block";

                clearInterval(x);
                }
                //seconds
            }, 0)
        }());
    </script>

@endif
