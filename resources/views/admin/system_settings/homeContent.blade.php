@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home Page Content</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif

    <section id="full-faq">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="accordion faq-area" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="heading1">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse1" aria-expanded="false"
                                        aria-controls="collapse1">
                                        After Slider Icon <span class="fa fa-caret-up"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>
                                        You can get font awesome cheets by clicking
                                        <a href="https://fontawesome.com/cheatsheet" target="_blank">Here</a>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Icon 1</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[0]->link}}" class="form-control mb-2" required>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[0]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[0]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[0]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Icon 2</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[1]->link}}" class="form-control mb-2" required>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[1]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[1]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[1]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Icon 3</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[2]->link}}" class="form-control mb-2" required>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[2]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[2]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[2]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Icon 4</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[3]->link}}" class="form-control mb-2" required>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[3]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[3]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[3]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading10">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse10" aria-expanded="false"
                                        aria-controls="collapse10">
                                        After Slider Banner <span class="fa fa-caret-up"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse10" class="collapse" aria-labelledby="heading10"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Banner</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> <img src="{{URL::to('storage/app')}}/{{$data[16]->title}}" width="50px" height="50px"> </label>
                                                <input type="file" name="title" class="form-control mb-2" required>
                                                <label for=""> Link </label>
                                                <input type="text" name="link" value="{{$data[16]->link}}" class="form-control mb-2" required>
                                                <input type="hidden" name="name" value="{{$data[16]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading2">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse2" aria-expanded="false"
                                        aria-controls="collapse2">
                                        Recommded for You <span class="fa fa-caret-down"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Recommdation 1</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[4]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2" required>{{$data[4]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[4]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Recommdation 2</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[5]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2" required>{{$data[5]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[5]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading3">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse3" aria-expanded="false"
                                        aria-controls="collapse3">
                                        Special Offer & Flash Sale<span class="fa fa-caret-down"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Special Offer</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[6]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[6]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[6]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Flash Sale</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[7]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[7]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[7]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading4">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse4" aria-expanded="false"
                                        aria-controls="collapse4">
                                        Featured Books & Testimonials <span class="fa fa-caret-down"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Featured Books</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[8]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[8]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[8]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Testimonials</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[9]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[9]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[9]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading5">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse5" aria-expanded="false"
                                        aria-controls="collapse5">
                                        Latest News & Subscriber Note <span class="fa fa-caret-down"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse5" class="collapse" aria-labelledby="heading5"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Latest News</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[10]->title}}" class="form-control mb-2" required>
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[10]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[10]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Subscriber Note</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Description </label>
                                                <textarea name="description" class="form-control mb-2 homeContentDescription" required>{{$data[11]->description}}</textarea>
                                                <input type="hidden" name="name" value="{{$data[11]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading6">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapse6" aria-expanded="false"
                                        aria-controls="collapse6">
                                        Customers & Collection & Store & Writers Count <span class="fa fa-caret-down"></span>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapse6" class="collapse" aria-labelledby="heading6"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Happy Customers</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[12]->link}}" class="form-control mb-2" required>
                                                <label for=""> Count </label>
                                                <input type="number" name="" class="form-control mb-2" value="{{count($happyCustomer)}}" disabled>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[12]->title}}" class="form-control mb-2" required>
                                                <input type="hidden" name="name" value="{{$data[12]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Books Collection</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[13]->link}}" class="form-control mb-2" required>
                                                <label for=""> Count </label>
                                                <input type="number" name="" class="form-control mb-2" value="{{count($allBooks)}}" disabled>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[13]->title}}" class="form-control mb-2" required>
                                                <input type="hidden" name="name" value="{{$data[13]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Our Store</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[14]->link}}" class="form-control mb-2" required>
                                                <label for=""> Count </label>
                                                <input type="number" name="" class="form-control mb-2" value="{{count($allAuthor)}}" disabled>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[14]->title}}" class="form-control mb-2" required>
                                                <input type="hidden" name="name" value="{{$data[14]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                            <h3>Famous Writers</h3>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <label for=""> Icon </label>
                                                <input type="text" name="link" value="{{$data[15]->link}}" class="form-control mb-2" required>
                                                <label for=""> Count </label>
                                                <input type="number" name="" class="form-control mb-2" value="{{count($allAuthor)}}" disabled>
                                                <label for=""> Title </label>
                                                <input type="text" name="title" value="{{$data[15]->title}}" class="form-control mb-2" required>
                                                <input type="hidden" name="name" value="{{$data[15]->name}}">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


<style>
    .homeContentDescription{
        padding: 12px 25px;
        height: 85px;
    }
    .section-heading {
        text-align: center;
        margin-bottom: 90px;
    }

    .section-heading h6 {
        font-size: 16px;
        letter-spacing: 3.2px;
        text-align: center;
        color: #ff9900;
        text-transform: uppercase;
        margin-bottom: 30px;
    }

    .section-heading h2 {
        font-size: 30px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.33;
        letter-spacing: normal;
        text-align: center;
        color: #323232;
    }

    #full-faq {
        padding: 20px 0;
    }

    #full-faq .faq-area .card {
        border: 0;
        margin: 8px 0;
        overflow: visible;
    }

    #full-faq .faq-area .card .card-header {
        border: 0;
        padding: 0;
        border-radius: 10px;
        -webkit-backdrop-filter: blur(8px);
        backdrop-filter: blur(8px);
        border: solid 1px #e3e8ec;
        background-color: #f5f8fa;
    }

    #full-faq .faq-area .card .card-header h2 button {
        padding: 20px 30px;
        font-weight: 600;
        font-size: 20px;
        font-stretch: normal;
        font-style: normal;
        line-height: 2;
        letter-spacing: normal;
        text-align: left;
        color: #000000;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
    }
    #full-faq .faq-area .card .card-header h2 button:focus {
        box-shadow: none;
    }
    #full-faq .faq-area .card .card-header h2 button span {
        color: #96a9b8;
    }

    #full-faq .faq-area .card .card-header.active {
        background-color: #fffef8;
    }

    #full-faq .faq-area .card .card-header.active span {
        color: #ff9900;
    }

</style>
<script>
    $('.card-header').on("click", function() {
        $(this).find('span').toggleClass("fa-caret-up fa-caret-down");
        $('.card-header').removeClass("active");
        $(this).toggleClass("active");
    });
</script>






