@extends("admin.layout.interface")
@section("breadcrumb")
    <li class="breadcrumb-item"><a href="{{URL::to('/admin')}}">Admin</a></li>
    <li class="breadcrumb-item" aria-current="page"><a href="#">System_Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Footer Content</li>
@endsection
@section("content")
    @if(Session::has('success'))
        @php $message = Session::get('success'); @endphp
        <div class="alert alert-success">{{$message}}</div>
        @php Session::pull('success'); @endphp
    @endif

    <div class="row p-3" style="background-color:white">
        <!-- Start Panel -->
        <div class="col-md-12 mb-2">
            <h4 class="text-center">Footer Content</h4>
            <p>
                You can get font awesome cheets by clicking
                <a href="https://fontawesome.com/cheatsheet" target="_blank">Here</a>
            </p>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-12">

            <section id="full-faq">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="accordion faq-area" id="accordionExample">
                                {{-- <div class="card">
                                    <div class="card-header" id="heading1">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapse1" aria-expanded="false"
                                                aria-controls="collapse1">
                                                First & Second <span class="fa fa-caret-down"></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>First</h5>
                                                        <label for=""> Icon </label>
                                                        <input name="icon" class="form-control mb-2" required value="{{$data[0]->icon}}">
                                                            <label for=""> Tilte </label>
                                                            <input name="title" class="form-control mb-2" required value="{{$data[0]->title}}">
                                                        <label for=""> Description </label>
                                                        <textarea name="description" class="form-control mb-2 descriptionFooter" required>{{$data[0]->description}}</textarea>
                                                        <input type="hidden" name="name" value="{{$data[0]->name}}">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>Second</h5>
                                                        <label for=""> Icon </label>
                                                        <input name="icon" class="form-control mb-2" required value="{{$data[1]->icon}}">
                                                            <label for=""> Tilte </label>
                                                            <input name="title" class="form-control mb-2" required value="{{$data[1]->title}}">
                                                        <label for=""> Description </label>
                                                        <textarea name="description" class="form-control mb-2 descriptionFooter" required>{{$data[1]->description}}</textarea>
                                                        <input type="hidden" name="name" value="{{$data[1]->name}}">
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
                                                Third<span class="fa fa-caret-down"></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>Third</h5>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <label for=""> Icon </label>
                                                                <input name="icon" class="form-control mb-2" required value="{{$data[2]->icon}}">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <label for=""> Tilte </label>
                                                                <input name="title" class="form-control mb-2" required value="{{$data[2]->title}}">
                                                            </div>
                                                        </div>

                                                        <div class="wrapper" element="1">
                                                            <div class="element">
                                                                <div class="row">
                                                                    @php
                                                                        $socailSites = explode("@",$data[2]->social_media);
                                                                        $sociallink = explode("@",$data[2]->social_link);
                                                                    @endphp
                                                                    @for ($i = 0; $i < count($sociallink); $i++ )
                                                                        @if ($i > 0)
                                                                            <div class="element{{$icount}}">
                                                                                <div class="row">
                                                                        @endif
                                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                            <label for=""> Social Site </label>
                                                                            <select name="social[]"  class="form-control fa" required>
                                                                                @foreach($socialMediaInfo as $social)
                                                                                    <option value="{{$social->id}}" class="fa"  {{$social->id == $socailSites[$i] ? 'selected' : ''}}>
                                                                                        @php echo "&#x".$social->icon.";"; @endphp
                                                                                        {{$social->title}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                            <label for=""> Social Link </label>
                                                                            <input type="text" name="link[]" value="{{$sociallink[$i]}}" class="form-control" required>
                                                                        </div>
                                                                        @if ($i == 0)
                                                                                </div><br>
                                                                            </div>
                                                                            <div class="results">
                                                                            @php $icount = 0; @endphp
                                                                        @else
                                                                            </div>
                                                                            <div class="buttons text-right mt-2">
                                                                                <i class="fa fa-minus remove ml-2 text-danger cursorpointer" element="element{{$icount}}"></i>
                                                                            </div><br>
                                                                        @endif
                                                                        @php $icount++ @endphp
                                                                    @endfor
                                                                </div>
                                                            <div class="buttons text-right mt-2">
                                                                    <i class="fa fa-plus clone ml-2 text-primary cursorpointer"></i>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="name" value="{{$data[2]->name}}">
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
                                                Four & Copyright <span class="fa fa-caret-down"></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>Four</h5>
                                                        <label for=""> Icon </label>
                                                        <input name="icon" class="form-control mb-2" required value="{{$data[3]->icon}}">
                                                        <label for=""> Tilte </label>
                                                        <input name="title" class="form-control mb-2" required value="{{$data[3]->title}}">
                                                        <input type="hidden" name="name" value="{{$data[3]->name}}">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>Copyright</h5>
                                                        <textarea name="description" class="form-control mb-2 descriptionFooter" required>{{$data[4]->description}}</textarea>
                                                        <input type="hidden" name="name" value="{{$data[4]->name}}">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card">
                                    <div class="card-header" id="heading1">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapse1" aria-expanded="false"
                                                aria-controls="collapse1">
                                                First  <span class="fa fa-caret-down"></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>First</h5>
                                                        <img src="{{URL::to('storage/app')}}/{{$data[6]->icon}}" width="100px" height="100px" alt="">
                                                        <input name="fileUpload" type="file" class="form-control mb-2">
                                                        <label for=""> Description </label>
                                                        <textarea name="description" class="form-control mb-2 descriptionFooter" required>{{$data[6]->description}}</textarea>
                                                        <input type="hidden" name="name" value="{{$data[6]->name}}">
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
                                                Follow Us<span class="fa fa-caret-down"></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <h5>Follow Us</h5>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                                <label for=""> Tilte </label>
                                                                <input name="title" class="form-control mb-2" required value="{{$data[7]->title}}">
                                                            </div>
                                                        </div>

                                                        <div class="wrapper" element="1">
                                                            <div class="element">
                                                                <div class="row">
                                                                    @php
                                                                        $socailSites = explode("@",$data[7]->social_media);
                                                                        $sociallink = explode("@",$data[7]->social_link);
                                                                    @endphp
                                                                    @for ($i = 0; $i < count($sociallink); $i++ )
                                                                        @if ($i > 0)
                                                                            <div class="element{{$icount}}">
                                                                                <div class="row">
                                                                        @endif
                                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                            <label for=""> Social Site </label>
                                                                            <select name="social[]"  class="form-control fa" required>
                                                                                @foreach($socialMediaInfo as $social)
                                                                                    <option value="{{$social->id}}" class="fa"  {{$social->id == $socailSites[$i] ? 'selected' : ''}}>
                                                                                        @php echo "&#x".$social->icon.";"; @endphp
                                                                                        {{$social->title}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                                                            <label for=""> Social Link </label>
                                                                            <input type="text" name="link[]" value="{{$sociallink[$i]}}" class="form-control" required>
                                                                        </div>
                                                                        @if ($i == 0)
                                                                                </div><br>
                                                                            </div>
                                                                            <div class="results">
                                                                            @php $icount = 0; @endphp
                                                                        @else
                                                                            </div>
                                                                            <div class="buttons text-right mt-2">
                                                                                <i class="fa fa-minus remove ml-2 text-danger cursorpointer" element="element{{$icount}}"></i>
                                                                            </div><br>
                                                                        @endif
                                                                        @php $icount++ @endphp
                                                                    @endfor
                                                                </div>
                                                            <div class="buttons text-right mt-2">
                                                                    <i class="fa fa-plus clone ml-2 text-primary cursorpointer"></i>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="name" value="{{$data[7]->name}}">
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
                                                Store <span class="fa fa-caret-down"></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <img src="{{URL::to('storage/app')}}/{{$data[8]->icon}}" width="100px" height="100px" alt="">
                                                        <input name="fileUpload" type="file" class="form-control mb-2">
                                                        <label for=""> Tilte </label>
                                                        <input name="title" class="form-control mb-2" required value="{{$data[8]->title}}">
                                                        <input type="hidden" name="name" value="{{$data[8]->name}}">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <label for=""> Icon </label>
                                                        <input name="icon" type="text" class="form-control mb-2"  value="{{$data[9]->icon}}" required>
                                                        <label for=""> Tilte </label>
                                                        <input name="title" class="form-control mb-2" required value="{{$data[9]->title}}">
                                                        <input type="hidden" name="name" value="{{$data[9]->name}}">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <label for=""> Icon </label>
                                                        <input name="icon" type="text" class="form-control mb-2"  value="{{$data[10]->icon}}" required>
                                                        <label for=""> Tilte </label>
                                                        <input name="title" class="form-control mb-2" required value="{{$data[10]->title}}">
                                                        <input type="hidden" name="name" value="{{$data[10]->name}}">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-12 col-sm-12">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <label for=""> Icon </label>
                                                        <input name="icon" type="text" class="form-control mb-2"  value="{{$data[11]->icon}}" required>
                                                        <label for=""> Tilte </label>
                                                        <input name="title" class="form-control mb-2" required value="{{$data[11]->title}}">
                                                        <input type="hidden" name="name" value="{{$data[11]->name}}">
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
        </div>
    </div>
<style>
    .descriptionFooter{
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


@endsection

