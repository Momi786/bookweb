@include ('web/include/header')


    <section>
        <div class="blog-single">
            <img src="{{URL:: to('storage/app')}}/{{$news->newsImg}}" class="" alt="img">

        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-log-content">
                        <h3>{{$news->newsTitle}}</h3>
                        <div class="mt-4 bg-gray">
                            <span>Posted By:<a href="#" class="ml-2">{{$author->name}}</a> At {{$news->created_at->format('M d, Y')}} | <a href="#" class="mr-2"> {{count($TotalComments)}} Comments </a> </span>
                        </div>
                        <div class="bg-gray mt-4">
                            @php
                                $desc = html_entity_decode($news->detailDes);
                                echo $desc;
                            @endphp
                        </div>
                    </div>
                    <div class="single-log-content mt-5">
                        <div class="share-article">
                            <h6 class="text-center">Share This Article</h6>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-facebook mr-2"><i class="fab fa-facebook-f mr-3"></i>Facebook</button>
                                <button class="btn btn-twitter mr-2"><i class="fab fa-twitter mr-3"></i>Twitter</button>
                                <button class="btn btn-google"><i class="fab fa-google-plus-g"></i>Google+</button>


                            </div>
                            <div class="text-center mt-3">
                            <span class="mt-5">Tages: <i>fashion</i></span>
                            </div>
                        </div>
                        <div class="media media-back mt-5">
                            <div class="artile-by">
                                <a href="{{URL::to('author-profile')}}/{{$author->id}}">
                                    <img src="{{URL:: to('storage/app')}}/{{$author->image}}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                            <p class="mb-0 text-color">
                                <strong>{{$author->name}}</strong>
                            </p>
                            <p class="p-color">{{$author->description}}</p>
                            </div>
                        </div>
                        <div class="mt-5" id="replyForm">
                            <h6 class="writeCR">WRITE COMMENT</h6>
                            <form action="{{URL::to('commentPost')}}" method="post">
                                <div class="row mt-4">
                                <div class="col-md-6 col-sm-12 col-12">
                                    <div class="form-group input-color">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12 col-12">
                                    <div class="form-group input-color">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="form-group input-color">
                                    <textarea name="message" class="messagePlaceholder" placeholder="Comment Message" id="" cols="100" rows="5"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="replyId" class="rreply">
                                <input type="hidden" name="newsId" value="{{$news->id}}">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-cmt">Save</button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-5">
                            @foreach ($comment as $comm)
                                @php
                                    $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                    $timeDate2 = strtotime($comm->created_at->format("Y-m-d H:i:s"));
                                    $minsDate = ($timeDate1 - $timeDate2) / 60;
                                    $formatEng = "min";
                                    $finelmin = intval($minsDate);
                                    if($finelmin > 60){
                                        $finelmin /= 60;
                                        $formatEng = "hours";
                                        if($finelmin > 24){
                                            $finelmin /= 24;
                                            $formatEng = "days";
                                            if($finelmin > 7){
                                            $finelmin /= 7;
                                            $formatEng = "weeks";
                                            if($finelmin > 4){
                                                $finelmin /= 4;
                                                $formatEng = "moths";
                                                if($finelmin > 12){
                                                    $finelmin /= 12;
                                                    $formatEng = "years";
                                                }
                                            }
                                            }
                                        }
                                    }
                                    $finelmin = intval($finelmin);
                                    $reply = $comm->GetReplies();
                                @endphp
                                <div class="media mt-5">
                                    <div class="artile-by">
                                        <img src="{{URL:: to('public/admin/assets/images/avatars/profile-image.png')}}" class="img-fluid" alt="">
                                    </div>
                                    <div class="media-body">
                                    <div class="d-flex">
                                    <p class="mb-0 text-color mr-4">
                                        <strong>{{$comm->name}}</strong>
                                    </p>
                                    <span class="p-color">{{$finelmin}} {{$formatEng}} ago</span>
                                    </div>
                                    <p class="p-color">{{$comm->message}}</p>
                                    <span class="p-color replyId" replyId="{{$comm->id}}">Reply</span>
                                    </div>
                                </div>

                                @if ($reply)
                                @foreach ($reply as $rel)
                                    @php
                                        $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                        $timeDate2 = strtotime($rel->created_at->format("Y-m-d H:i:s"));
                                        $minsDate = ($timeDate1 - $timeDate2) / 60;
                                        $formatEng = "min";
                                        $finelmin = intval($minsDate);
                                        if($finelmin > 60){
                                            $finelmin /= 60;
                                            $formatEng = "hours";
                                            if($finelmin > 24){
                                                $finelmin /= 24;
                                                $formatEng = "days";
                                                if($finelmin > 7){
                                                $finelmin /= 7;
                                                $formatEng = "weeks";
                                                if($finelmin > 4){
                                                    $finelmin /= 4;
                                                    $formatEng = "moths";
                                                    if($finelmin > 12){
                                                        $finelmin /= 12;
                                                        $formatEng = "years";
                                                    }
                                                }
                                                }
                                            }
                                        }
                                        $finelmin = intval($finelmin);
                                        $reply = $comm->GetReply;
                                    @endphp
                                    <div class="media mt-5 ml-5">
                                        <div class="artile-by">
                                            <img src="{{URL:: to('public/admin/assets/images/avatars/profile-image-4.jpg')}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="media-body">
                                        <div class="d-flex">
                                        <p class="mb-0 text-color mr-4">
                                            <strong>{{$rel->name}}</strong>
                                        </p>
                                        <span class="p-color">{{$finelmin}} {{$formatEng}} ago</span>
                                        </div>
                                        <p class="p-color">{{$rel->message}}</p>
                                        <span class="p-color replyId" replyId="{{$rel->replyId}}">Reply</span>
                                        </div>
                                    </div>
                                @endforeach
                                @endif
                            @endforeach
                            {{-- <div class="media mt-5 ml-5">
                                <div class="artile-by">
                                    <img src="{{URL:: to('public/assests/img/author.jpeg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="media-body">
                                <div class="d-flex">
                                <p class="mb-0 text-color mr-4">
                                    <strong>Display Name</strong>
                                </p>
                                <span class="p-color">Last week</span>
                                </div>
                                <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
                                <span class="p-color">Reply</span>
                                </div>
                            </div>
                            <div class="media mt-5 ml-5">
                                <div class="artile-by">
                                    <img src="{{URL:: to('public/assests/img/author.jpeg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="media-body">
                                <div class="d-flex">
                                <p class="mb-0 text-color mr-4">
                                    <strong>Display Name</strong>
                                </p>
                                <span class="p-color">Last week</span>
                                </div>
                                <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
                                <span class="p-color">Reply</span>
                                </div>
                            </div>
                            <div class="media mt-5">
                                <div class="artile-by">
                                    <img src="{{URL:: to('public/assests/img/author.jpeg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="media-body">
                                <div class="d-flex">
                                <p class="mb-0 text-color mr-4">
                                    <strong>Display Name</strong>
                                </p>
                                <span class="p-color">Last week</span>
                                </div>
                                <p class="p-color">Lorem ipsum dolor sit amet, consectetur sit amet.</p>
                                <span class="p-color">Reply</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
            <section class=" mt-5">
                <div class="row">
                    <div class="col-md-12 col-md-12 text-center">
                        <h2 class="text-color mb-5">Related Articles</h2>
                        <div class="row">
                              @foreach ($OtherNews as $news1)

                              <div class="col-md-4 col-sm-12 col-12">
                                <div class="item m-3">
                           <div class="card7">
                              <img class="card-img-top" src="{{URL::to('storage/app')}}/{{$news1->newsImg}}" alt="Card image cap">
                              <div class="card-body border-0 text-left">
                              <span>{{$news1->created_at->format("M d, Y")}}</span>
                                 <h5 class="card-title text-color">{{$news1->title}}</h5>

                                 <p class="card-text">{{$news1->shotDes}}</p>
                                 <a href="{{URL::to('/single-blog')}}/{{$news1->id}}"><h6>Continue Reading</h6></a>

                              </div>
                           </div>
                        </div>
                            </div>
                           @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


<style>
    .replyId{
        cursor: pointer;
    }
</style>




@include ('web/include/footer')

<script>
    $(".replyId").on('click',function () {
        var replyId = $(this).attr('replyId');
        console.log('asd');
        var elmnt = document.getElementById("replyForm");
        elmnt.scrollIntoView();
        $(".writeCR").html("WRITE Reply");
        $(".rreply").val(replyId);
        $(".messagePlaceholder").attr("placeholder","Reply Message");
    })
</script>
