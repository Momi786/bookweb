@include ('web/include/header')


    <section>
        <div class="about-bg">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                <div class="">
                        <h1>Nice to Meet You</h1>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-12 mt-5">
                    <p class="p-color">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste vitae maiores numquam, sapiente officia magnam. Iure culpa sapiente enim iste quia saepe voluptatibus aspernatur quam. Expedita corrupti non eius ab?
                    </p>
                    <p class="mt-5 p-color">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam obcaecati distinctio similique id aliquam saepe corporis quis et sunt? Nihil ad quia obcaecati nesciunt odio reiciendis rerum animi dolorum aspernatur.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 col-12 mt-5">
                    <p class="p-color">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste vitae maiores numquam, sapiente officia magnam. Iure culpa sapiente enim iste quia saepe voluptatibus aspernatur quam. Expedita corrupti non eius ab? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam obcaecati distinctio similique id aliquam saepe corporis quis et sunt? Nihil ad quia obcaecati nesciunt odio reiciendis rerum animi dolorum aspernatur.
                    </p>

                </div>
            </div>
        </div>
    </section>
        <section>
            <div class="bg-grey">
                <div class="container">
                    <div class="row text-center p-member">
                        <div class="col-md-12">
                            <h4>On Boared Members</h4>
                        </div>
                        @foreach ($memberBoard as $mem)
                            <div class=" col-md-3 col-12 mb-3">
                                <div class="card8 mt-5">
                                    <img src="{{URL::to('storage/app')}}/{{$mem->image}}" alt="featured image" class="mb-1">
                                    <div class="card-body border-0 p-0 text-center">
                                        <h6 class="card-title text-color">{{$mem->name}}</h6>
                                        <p class="text-blue"  style="font-size:13px;">{{$mem->designation}}</p>
                                        <div class="d-flex justify-content-center member-icn p-2">
                                            @php
                                                $socialSites = explode('@',$mem->social_sites);
                                                $socialLinks = explode('@',$mem->social_link);
                                            @endphp
                                            @for($i = 0; $i < count($socialSites); $i++ )
                                                @php $site = App\Models\SocialMediaModel::find($socialSites[$i]); @endphp
                                                <a href="{{$socialLinks[$i]}}"><i class="fa mr-3 text-dark">@php echo "&#x".$site->icon.";"; @endphp</i></a>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </section>


        <section class="mt-5">
            <div class="container">
            <div class="row">
                    <?php
                        for ($i = 0; $i < 3; $i++):
                        ?>
                        <div class="col-md-4 col-sm-12 col-12 text-center p-3">
                            <div class="customer-box">
                            <i class="fas fa-user-friends"></i>
                            <h3>13000</h3>
                            <h5>Happy Customers</h5>
                            </div>
                        </div>
                    <?php endfor;?>
                    </div>
            </div>
        </section>





















@include ('web/include/footer')

