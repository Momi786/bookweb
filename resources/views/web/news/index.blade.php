@include ('web/include/header')

<div class="container mt-4">

<section class=" mt-5">
   <div class="row">
      <div class="col-md-12 col-md-12 text-center">
         <h2 class="text-color mb-5">Our Latest news</h2>
         <div class="row">
               @foreach ($totalNews as $news)

                <div class="col-md-4 col-sm-12 col-12">
                    <div class="item m-3">
               <div class="card7">
                  <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$news->newsImg}}" alt="Card image cap">
                  <div class="card-body border-0 text-left">
                  <span>{{$news->created_at->format("M d, Y")}}</span>
                     <h5 class="card-title text-color">{{$news->title}}</h5>

                     <p class="card-text">{{$news->shotDes}}</p>
                     <a href="{{URL::to('single-blog')}}/{{$news->id}}"><h6>Continue Reading</h6></a>

                  </div>
               </div>
            </div>
                </div>
            @endforeach
         </div>
      </div>
   </div>
</section>




@include ('web/include/footer')
