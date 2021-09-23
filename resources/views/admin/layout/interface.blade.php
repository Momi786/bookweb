<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Card Offer | Admin">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="Card Offer">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Book Store | Admin</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
        <link href="{{url('public/admin')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{url('public/admin')}}/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Ckeditor Styles -->
        <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>

		<!-- data Tables -->
            <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" />
		    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css"/>
		    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css"/>


        <!-- Theme Styles -->
        <link href="{{url('public/admin')}}/assets/css/connect.min.css" rel="stylesheet">
        <link href="{{url('public/admin')}}/assets/css/dark_theme.css" rel="stylesheet">
        <link href="{{url('public/admin')}}/assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-sidebar">
                <div class="logo-box">
                    <a href="#" class="logo-text">
                        <img src="{{URL::to('public/assests/img/logo.png')}}" alt="" width="115px">
                    </a>
                    <a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
                <div class="page-sidebar-inner slimscroll">
                    @include("admin.layout.sidebar")
                </div>
            </div>
            <div class="page-container">
                <div class="page-header">
                    <nav class="navbar navbar-expand">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{url('public/admin')}}/assets/images/avatars/profile-image-1.png" alt="profile image">
                                    <span>{{Session::get("onlineuser")->username}}</span><i class="material-icons dropdown-icon">keyboard_arrow_down</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{URL::to('admin/change-details')}}">Change Details</a>
                                    <a class="dropdown-item" href="{{URL::to('admin/change-password')}}">Change Password</a>
                                    {{-- <a class="dropdown-item" href="#">Calendar<span class="badge badge-pill badge-info float-right">2</span></a>
                                    <a class="dropdown-item" href="#">Settings &amp Privacy</a>
                                    <a class="dropdown-item" href="#">Switch Account</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{url('admin/logout')}}">Log out</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">notifications</i></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="dark-theme-toggle"><i class="material-icons-outlined">brightness_2</i><i class="material-icons">brightness_2</i></a>
                            </li>
                        </ul>
                        {{-- <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Reports</a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="navbar-search">
                            <form>
                                <div class="form-group">
                                    <input type="text" name="search" id="nav-search" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
                <div class="page-content" style="min-height:570px">
                    <div class="page-info">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @yield("breadcrumb")
                            </ol>
                        </nav>
                        {{-- <div class="page-options">
                            <a href="#" class="btn btn-secondary">Settings</a>
                            <a href="#" class="btn btn-primary">Upgrade</a>
                        </div> --}}
                    </div>
                    <div class="main-wrapper">
                        @yield("content")
                    </div>
                </div>
                <div class="page-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="footer-text">2021 ©</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<style>
    .fa{
        font-family:'Font Awesome 5 Pro', 'Font Awesome 5 Free','Font Awesome 5 Solids', 'Font Awesome 5 Brands' !important;
    }
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child{
        position:relative;
    }
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before {
        top: 15px;
        left: 4px;
        height: 14px;
        width: 14px;
        display: block;
        position: absolute;
        color: white;
        border: 2px solid white;
        border-radius: 14px;
        box-shadow: 0 0 3px #444;
        box-sizing: content-box;
        text-align: center;
        font-family: 'Courier New', Courier, monospace;
        line-height: 14px;
        content: '+';
        background-color: #31b131;
    }
    .cursorpointer{
        cursor:pointer;
    }
</style>
        <!-- Javascripts -->
        <script src="{{url('public/admin')}}/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/bootstrap/popper.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/apexcharts/dist/apexcharts.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/blockui/jquery.blockUI.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="{{url('public/admin')}}/assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="{{url('public/admin')}}/assets/js/connect.min.js"></script>
        <script src="{{url('public/admin')}}/assets/js/pages/dashboard.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- DataTable -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
		    <script src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
		    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>



        
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>

        <script>
            // sideBar Select
            $(function () {
                setNavigation();
            });
            function setNavigation() {
                var path = window.location.href;
                var urlfind = 0;
                $(".accordion-menu a").each(function () {
                    var href = $(this).attr('href');
                    if (path === href) {
                        urlfind = 1;
                        console.log(href);
                        var ul = $(this).parent().parent();
                        var attributeClass = $(ul).attr("class");
                        if (attributeClass == "sub-menu"){
                            $(ul).closest('li').addClass('active-page open');
                            $(ul).show();
                            $(this).addClass('text-dark');
                        }else{
                            $(this).closest('li').addClass('active-page');
                        }
                    }
                });
                if(urlfind == 0){
                    path = path.split("/");
                    path.pop();
                    var count567 = path.length - 1;
                    var isupdate = path[count567];
                    console.log(isupdate);
                    if(isupdate == "update"){
                        path.pop();
                    }
                    path = path.join("/");
                $(".accordion-menu a").each(function () {
                    var href = $(this).attr('href');

                    if (path === href) {
                        urlfind = 1;
                        console.log(href);
                        var ul = $(this).parent().parent();
                        var attributeClass = $(ul).attr("class");
                        if (attributeClass == "sub-menu"){
                            $(ul).closest('li').addClass('active-page open');
                            $(ul).show();
                            $(this).addClass('text-dark');
                        }else{
                            $(this).closest('li').addClass('active-page');
                        }
                    }
                });
                }
            }
            // Ckeditor
            CKEDITOR.replace( 'editor1' );
            // Delete Alert
            $(".deleteAlert").click(function(){
                if (!confirm("Do you want to Delete")){
                return false;
                }
            });
            // Data Table
            $('#myTable').DataTable({
                // rowReorder: {
                //     selector: 'td:nth-child(2)'
                // },
                responsive: true
            });
            // Data Table
            $('#myTable1').DataTable({
               
               dom: 'Bfrtip',
               buttons: [
                   {
                       extend: 'excelHtml5',
                       title: 'Excel',
                       text:'Export to excel'
                       //Columns to export
                       //exportOptions: {
                      //     columns: [0, 1, 2, 3,4,5,6]
                      // }
                   },
                   {
                       extend: 'pdfHtml5',
                       title: 'PDF',
                       text: 'Export to PDF'
                       //Columns to export
                       //exportOptions: {
                      //     columns: [0, 1, 2, 3, 4, 5, 6]
                     //  }
                   }
               ]
           });

            // form Submit by clicking checkbox
            $(".formSubmitJq").on('change',function() {
                console.log("dasasd");
                var data = $(this).parent();
                data.submit();
            })

            // Data Appand & remove
            $('.wrapper').on('click', '.remove', function(){
                if (confirm("Do you want to Delete")) {
                    var elementCard = $(this).attr('element');
                    var elementCard = "." + elementCard;
                    var removeCard = $(".results").find(elementCard);
                    $(removeCard).html("");
                }
            });
            $('.wrapper').on('click', '.clone', function(){
                var element = $(".wrapper").attr("element");
                element++;
                $(".wrapper").attr("element",element);
                var elementCard1 = "element" + element;
                $('.results').append("<div class='"+elementCard1+"'><div class='row'><div class='col-lg-6 col-md-6 col-sm-12 col-12'><label for=''> Social Site </label><select name='social[]'  class='form-control fa' required><?php foreach($socialMediaInfo as $social):?><option value='<?=$social->id?>' class='fa'><?php echo '&#x'.$social->icon.';'; ?> <?=$social->title?></option><?php endforeach?></select></div><div class='col-lg-6 col-md-6 col-sm-12 col-12'><label for=''> Social Link </label><input type='text' name='link[]' class='form-control' required></div></div><div class='buttons text-right mt-2'><i class='fa fa-minus remove ml-2 text-danger cursorpointer' element='"+elementCard1+"'></i></div><br></div>");
            });

            
            // meta tags script start
            $(".js-example-tokenizer").select2({
                    tags: true,
                    tokenSeparators: [',', ' ']
                });
                // description Limit
                var count = $(".description").val();
                var len = count.length;
                len = 990 - len;
                $(".descriptionCount").html("remaining: " + len);
                $(".description").on("keyup",function(){
                var count = $(".description").val();
                var len = count.length;

                if(len == 0){
                    $(".descriptionCount").hide();
                }else{
                    $(".descriptionCount").show();
                }
                len = 990 - len;
                $(".descriptionCount").html("remaining: " + len);
                });

                // title Limit
                var count = $(".titleCountFlied").val();
                var len = count.length;
                len = 580 - len;
                $(".titleCount").html("remaining: " + len);
                $(".titleCountFlied").on("keyup",function(){
                var count = $(".titleCountFlied").val();
                var len = count.length;

                if(len == 0){
                    $(".titleCount").hide();
                }else{
                    $(".titleCount").show();
                }
                len = 580 - len;
                $(".titleCount").html("remaining: " + len);
                });
            // meta tags script end
        </script>
    </body>
</html>


