
<div class="container relative">
    <div class="row">
        <div class="col-md-12">
            <div class="newletter-bg text-center">
                <h4>Get Special Offers in Your Inbox</h4>
                <div class="d-flex justify-content-center mt-3">
                    <div class="form-group mr-3">
                        <input type="text" placeholder="Enter Your Email Address" class="form-control">
                    </div>
                    <button class="btn btn-subscribe">Subscribe</button>
                </div>
            </div>
        </div>
    </div>

</div>
</section>

<div class="bg-footer">
<footer class="footer" style="margin-top: 133px;">
   <div class="container bottom_border">
      <div class="row mt-5">
         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
            <h5 class="headin5_amrc col_white_amrc pt2 text-white"><i class="fa mr-2">@php echo "&#x".$FooterContent[0]->icon.";"; @endphp</i>{{$FooterContent[0]->title}}</h5>
            <!--headin5_amrc-->
            <p class="">{{$FooterContent[0]->description}}</p>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
            <h5 class="pt2 text-white"><i class="fa mr-2">@php echo "&#x".$FooterContent[1]->icon.";"; @endphp</i>{{$FooterContent[1]->title}}</h5>
            <p class="">{{$FooterContent[1]->description}}</p>

         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-12 ">
            <h5 class="pt2 text-white"><i class="fa mr-2">@php echo "&#x".$FooterContent[2]->icon.";"; @endphp</i>{{$FooterContent[2]->title}}</h5>
            @php
                $socialSites = explode('@',$FooterContent[2]->social_media);
                $socialLinks = explode('@',$FooterContent[2]->social_link);
            @endphp
            @for($i = 0; $i < count($socialSites); $i++ )
                @php $site = App\Models\SocialMediaModel::find($socialSites[$i]); @endphp
                <ul class="li mb-0"><a href="{{$socialLinks[$i]}}" class="GetInTounchanchorStyle"><i class="fa mr-3">@php echo "&#x".$site->icon.";"; @endphp</i> {{$site->title}}</a></ul>
            @endfor
         </div>
         <div class=" col-lg-3 col-md-3 col-sm-12 col-12">
            <h5 class="headin5_amrc col_white_amrc pt2 text-white"><i class="fa mr-2">@php echo "&#x".$FooterContent[3]->icon.";"; @endphp</i>{{$FooterContent[3]->title}}</h5>
            <div class="row">
                <div class="col-4">
                <ul>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Contact Us</a></li>
                     <li><a href="#">Products</a></li>

                  </ul>
                </div>
                <div class="col-4">
                    <ul>
                    <li><a href="#">Login</a></li>
                     <li><a href="#">SignUp</a></li>
                     <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <!--headin5_amrc ends here-->
            <!--footer_ul2_amrc ends here-->
         </div>
      </div>
   </div>
   <div class="container">
      <!--foote_bottom_ul_amrc ends here-->
      <p class="mb-0 text-white text-center">{{$FooterContent[4]->description}}</p>
      <!--social_footer_ul ends here-->
   </div>
</footer>

</div>

</body>

<style>
    .GetInTounchanchorStyle{
        display: block;
        padding: 10px 0px;
        font-size: 12px;
        text-transform: capitalize;
        font-weight: bolder;
        color: white;
        text-decoration: none;
    }
    .footer .col-4 ul li a,.footer .col-4 ul li a {
    display: block;
    padding: 10px 0px;
    font-size: 12px;
    text-transform: capitalize;
    font-weight: bolder;
    color: white;
    text-decoration: none;
}
.footer .col-4 ul li, .footer .col-4 ul li {
    display: block;
}

.footer .col-4 ul, .footer .col-4 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
</style>

    <!-- jquery Cdn -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</html>
