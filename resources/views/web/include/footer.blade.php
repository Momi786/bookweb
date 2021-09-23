
</div>

<section class="mt-5">
<div class="container">
    <div class="row">
        <div class="col-md-12 bg-purple">
            <div>
               <h5 class="f-27 ">
                  Subscribe To Our Newsletter For Newest Books Updates
               </h5>
            </div>
            <form action="{{URL::to('newsletterSubscription')}}" method="post">
               <div class="input-group input-control justify-content-center subcribeLater">
                  <input type="email" name="email" class="" placeholder="Type Your Mail Here" required>
                  <div class="input-group-append">
                     <button class="btn btn-white" type="submit">Subscribe</button>
                  </div>
               </div>
            </form>
        </div>
    </div>
 </div>
</section>
<footer class="footer mt-100">
   <div class="container bottom_border">
      <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <h5 class="headin5_amrc col_white_amrc pt2">
                <img src="{{URL::to('storage/app')}}/{{$FooterContent[6]->icon}}" width="100px" alt="">
            </h5>
            <!--headin5_amrc-->
            <p class="mb10">{{$FooterContent[6]->description}}</p>
            <h5 class="headin5_amrc col_white_amrc pt2">{{$FooterContent[7]->title}}</h5>
            <div class="d-flex icone-inline">
            @php
                $socialSites = explode('@',$FooterContent[7]->social_media);
                $socialLinks = explode('@',$FooterContent[7]->social_link);
            @endphp
            @for($i = 0; $i < count($socialSites); $i++ )
                @php $site = App\Models\SocialMediaModel::find($socialSites[$i]); @endphp
                <a href="{{$socialLinks[$i]}}" class="GetInTounchanchorStyle"><i class="fa mr-32">@php echo "&#x".$site->icon.";"; @endphp</i></a>
            @endfor


               {{-- <i class="fab fa-youtube youtube mr-2"></i>
               <i class="fab fa-twitter twitter mr-2"></i>
               <i class="fab fa-linkedin linkedin mr-2"></i>
               <i class="fab fa-instagram insta mr-2"></i> --}}
            </div>
         </div>
         <div class="col-lg-3 col-md-3 col-sm-12 col-12">
            <h5 class="pt2">Books Categories</h5>
            <div class="row">
               <div class="col-5">
                  <ul>
                     @php $i = 1; @endphp
                     @foreach($AllBookCategories as $bookCat)
                        <li><a href="{{URL::to('all-book')}}">{{$bookCat->name}}</a></li>
                        @if($i == 7)
                           </ul>
                        </div>
                        <div class="col-5">
                           <ul>
                        @endif
                        @php $i++ @endphp
                     @endforeach
                  </ul>
            </div>
            </div>
         </div>
         <div class="col-lg-2 col-md-2 col-sm-12 col-12 ">
            <h5 class="pt2">Quick Links</h5>
            <div class="row">
               <div class="col-10">
                  <ul>
                     @foreach ($MainMenu as $menu)
                        <li>
                           <a class="" href="{{URL::to('')}}/{{$menu->link}}">{{$menu->name}}</a>
                        </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
         <div class=" col-lg-3 col-md-3 col-sm-12 col-12">
            <h5 class="headin5_amrc col_white_amrc pt2">{{$FooterContent[8]->title}}</h5>
            <div class="row">
               <div class="col-10">
                  <ul>
                     <li><a href="#"><img src="{{URL::to('storage/app')}}/{{$FooterContent[8]->icon}}" class="img-fluid" alt="" style="height:84px; width:218px"></a></li>
                     <li><a href="#"><i class="fa mr-3">@php echo "&#x".$FooterContent[9]->icon.";"; @endphp</i>{{$FooterContent[9]->title}}</a></li>
                     <li><a href="#"><i class="fa mr-3">@php echo "&#x".$FooterContent[10]->icon.";"; @endphp</i>{{$FooterContent[10]->title}}</a></li>
                     <li><a href="#"><i class="fa mr-3">@php echo "&#x".$FooterContent[11]->icon.";"; @endphp</i>{{$FooterContent[11]->title}}</a></li>

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
      <p class="">Copyright @2021 | Designed With by <a href="#">Book Store Website</a></p>
      <!--social_footer_ul ends here-->
   </div>
</footer>



</body>

<style>
    .footer .col-5 ul li a,.footer .col-10 ul li a {
    display: block;
    padding: 10px 0px;
    font-size: 12px;
    text-transform: capitalize;
    font-weight: bolder;
    color: #46495c;
    text-decoration: none;
}
.footer .col-5 ul li, .footer .col-10 ul li {
    display: block;
}

.footer .col-5 ul, .footer .col-10 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
</style>





    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script>

$(function() {
  $(".AddToCart").on("click",function () {
     console.log("ads");
    var productId = $(this).attr("productid");
    var url = "{{URL::to('addToCart')}}" + "/" + productId;
    $(function() {
      $.ajax({
          type: "POST",
          url: url,
          success: function(data){
            console.log(data);
            var numCart = $(".addOnCartClick").html();
            $(".addOnCartClick").html(++numCart);
          }
      });
    });
  });
});


</script>
<script>
     var ALERT_TITLE = "Bookweb";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
	window.alert = function(txt) {
		createCustomAlert(txt);
	}
}

function createCustomAlert(txt) {
	d = document;

	if(d.getElementById("modalContainer")) return;

	mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
	mObj.id = "modalContainer";
	mObj.style.height = d.documentElement.scrollHeight + "px";

	alertObj = mObj.appendChild(d.createElement("div"));
	alertObj.id = "alertBox";
	if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
	alertObj.style.visiblity="visible";

	h1 = alertObj.appendChild(d.createElement("h1"));
	h1.appendChild(d.createTextNode(ALERT_TITLE));

	msg = alertObj.appendChild(d.createElement("p"));
	//msg.appendChild(d.createTextNode(txt));
	msg.innerHTML = txt;

	btn = alertObj.appendChild(d.createElement("a"));
	btn.id = "closeBtn";
	btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
	btn.href = "#";
	btn.focus();
	btn.onclick = function() { removeCustomAlert();return false; }

	alertObj.style.display = "block";

}

function removeCustomAlert() {
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
function ful(){
alert('Your cart update succesfully.');
}


</script>
    <!-- jquery Cdn -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
      
      $("input.searchsite").on("keyup",function() {
         var input = $(this).val();
         var url = "{{URL::to('autocomplete')}}";
         $.ajax({
            type: "POST",
            url: url,
            data:input,
            success: function(data){
               console.log(data[0].name);
               element = [];
               for (let index = 0; index < data.length; index++) {
                  element[index] = data[index].name;
               };
               console.log(element);
            }
         });
       })
    </script>
</html>



