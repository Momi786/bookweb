@include ('web/include/header')

<!-- autor detailss -->

   <section>
      <div class="bg-author">
         <div class="container">
            <div class="row">


               <div class="col-md-12 text-canter pt-5">
               <div class="autor-img">
                  <p align="center">
                     <img src="{{URL::to('storage/app')}}/{{$AuthorDetail->image}}" alt="featured image" class="img-fluid mb-1">
                     </p>
                     <div class="card-body border-0 p-0 text-center">
                        <h6 class="card-title text-color">{{$AuthorDetail->name}}</h6>
                        <span>
                           <h5>{{count($Books)}} Books</h5>
                        </span>
                        <p style="padding: 0 30%;">{{$AuthorDetail->description}}</p>
                        <div class="d-flex justify-content-center font-icn p-2">
                            @php
                                $socialSites = explode('@',$AuthorDetail->social_sites);
                                $socialLinks = explode('@',$AuthorDetail->social_link);
                            @endphp
                            @for($i = 0; $i < count($socialSites); $i++ )
                                @php $site = App\Models\SocialMediaModel::find($socialSites[$i]); @endphp
                                <a href="{{$socialLinks[$i]}}"><i class="fa mr-3 text-dark">@php echo "&#x".$site->icon.";"; @endphp</i></a>
                            @endfor


                        </div>
                     </div>
                  </div>

               </div>

         </div>
      </div>
   </section>

<div class="container">
<section class="mt-5">
   <div class="row">
      <div class="col-md-12">
         <h2 class="text-title text-center mb-5">All {{$AuthorDetail->name}} Books</h2>
        <div class="row">
            @foreach ($Books as $bok)
                @php
                    $category = $bok->GetCategory();
                @endphp
                <div class=" col-md-2 col-12 mb-3">
                    <img src="{{URL::to('storage/app')}}/{{$bok->cover_image}}" alt="featured image" class="w-100 mb-1" height="226px">
                    <div class="card-body border-0 p-0 text-left">
                        <h6 class="card-title text-color mb-0">{{$bok->name}}</h6>
                        <p class="text-blue m-0"  style="font-size:13px;">{{$category->name}}</p>
                        <span class="text-dark">${{$bok->price}}</span>
                    </div>
                </div>
            @endforeach
        </div>

            <div class="mt-5">
               <button class="btn btn-block btn-blue p-3">Load More Books</button>
            </div>
      </div>
   </div>
</section>


</div>
<section class="bg-grey mt-5 pt-5">
      <div class="container">
         <div class="col-md-12">
            <h4 class="text-center">
                View Another Authors
            </h4>
            <div class="row">
                @foreach ($otherAuthor as $auth)
                    @php
                        $other = $auth->GetUserInfo();
                        $bookss = $auth->GetBooks();
                    @endphp
                    <div class=" col-md-2 col-12 mb-3">
                        <div class="card8 text-center mt-5">
                            <img src="{{URL::to('storage/app')}}/{{$other->image}}" alt="featured image" class="mb-1">
                            <div class="card-body border-0 p-0 text-center">
                                <h6 class="card-title text-color">{{$other->name}}</h6>
                                <p class="text-blue"  style="font-size:13px;">{{count($bookss)}} Books</p>
                                <a href="{{URL::to('author-profile')}}/{{$other->userId}}"><span class="">View Profile</span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
         </div>
      </div>


      @include ('web/include/footer')

