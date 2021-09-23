<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Book Store</title>
      <!-- style file -->
      <link href="{{URL::to('public/assests/css/style.css')}}" rel="stylesheet">
      <!-- bootstrap cdn -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
      <!-- fontawesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
      <!-- owl carousel -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
   </head>
   <body>
      <div class="wrapper">
      <div class="container">
         <header class="bg-white">
            <div class="row">
                <div class="col-md-4">
                    <div>
                        <img src="../img/logo.png" class="imgg-fluid" alt="" style="width: 100px;">
                    </div>
                </div>
                <div class="col-md-8 text-right" style="padding: 13px;">
                    <div class="d-flex">
                    <div class="input-icons mt-0 mr-4">
                        <i class="fas fa-search icon"></i>
                        <input class="input-field" type="search" placeholder="Search Here Over 30 Million Books">
                    </div>
                    <div class="d-flex">
                        <span><i class="fas fa-user icon"></i></span>
                        <span><i class="fas fa-shopping-cart icon"></i></span>
                    </div>
                    </div>
                </div>
            </div>

         </header>
      </div>
      <div class="container shadow">
          <div class="row">
              <div class="col-md-12">
              <nav>
            <ul class="nav justify-content-center p-2">
                <li class="nav-item">
                    <a class="nav-link text-black" href="../home/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Magazines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Textbooks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Audio Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Recommended</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="#">Sale</a>
                </li>
            </ul>
            </nav>
              </div>
          </div>
      </div>


