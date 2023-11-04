<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ayam Geprek</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}"  rel="icon">
 
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- Demo CSS (No need to include it into your project) -->
  <link rel="stylesheet" href="{{ asset('css/demo.css') }}">

  <!-- =======================================================
  * Template Name: Amoeba
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>



<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      
        
        <div class="logo me-auto">
        <h1><a href="index.html">Geprek</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      
      

    </div> 
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1><b>Ayam Geprek</b></h1>
      <h2><b>Ayam geprek nomor 1 Surabaya</b></h2>
      <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
    </div>
  </section><!-- #hero -->

  <main id="main">

    

    <!-- ======= Our Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h3><b>Status Pesanan</b></h3>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nama Pembeli</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Status</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach ($pesan as $item)
            <tr>
              <th scope="row">{{ $item->id }}</th>
              <th scope="row" >{{ $item->nama_pembeli }}</th>
              <th scope="row" >
                @foreach ($item->menu as $menus)
                  <li>{{ $menus->nama }}</li>
                @endforeach
              </th>
              <th scope="row" >{{ $item->total_harga}}</th>
              <th scope="row" >
                    @if ($item->status == 0)
                    <div class="alert alert-danger" role="alert">
                      Sedang Diproses
                    </div>
                    @else
                    <div class="alert alert-primary" role="alert">
                      Pesanan Ready
                    </div>
                        
                    @endif

                    
                  </th>

                
            </tr>
            @endforeach
            
          </tbody>
        </table>

        

              
              
            <!-- </ul>
          </div>
        </div> -->

        

        @if ($errors->has('message_success'))
  
              <div class="p-4 bg-success border border-success-subtle rounded-3" style="color:white">
            
                  <strong>{{ $errors->first('message_success') }}</strong>
                
            
              </div>
            @endif
          
            @if ($errors->has('message'))
          
              <div class="p-4 bg-danger border border-danger-subtle rounded-3">
            
                  <strong style="color:black">{{ $errors->first('message') }}</strong>
                
            
              </div>
            @endif

        <div class="form-outline mb-4">
   
    
  </div>

  
  

  <div id="market"> 
    
  

@foreach ($menu as $item)


     
<!-- <div class="items product">
  <img src="{{ asset('storage/menu/'.$item->foto) }}">
</div> -->

<div class="row portfolio-container">
  
  <div class="col-lg-4 col-md-6 portfolio-item filter-app">
    <div class="portfolio-wrap">
      <div class="items">
        <input name="pesan[]" type=hidden value="{{ $item->id }}">
      <img src="{{ asset('storage/menu/'.$item->foto) }}" class="img-fluid" alt="">
      <input name="harga[]" type='number' value="{{ $item->harga }}">
      </div>
      <div class="portfolio-info">
        <h3><a href="{{ asset('storage/menu/'.$item->foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1">{{$item->nama}}</a></h3>
        
              <!-- <div class="items product"> -->
                <!-- <input type=hidden name="pesan" value="{{ $item->id }}">  -->
                <!-- <button class="btn-danger">Pesan</button> -->
              <!-- </div> -->
                
                <div>
                
                  <!-- <a href="{{ asset('img/portfolio/portfolio-1.jpg') }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a> -->
                
                </div>
              </div>
            </div>
          </div>

@endforeach  
        <form method="POST" action="{{ url('/pesan_menu' )}}" enctype="multipart/form-data" >
        @csrf 

<div class="app">
<div class="closewindow">
<span>x</span>
</div>
  <h2>Cart Details</h2>
      <i class="fa fa-shopping-basket fa-3x" aria-hidden="true"></i>
      <div class="form-outline mb-4" style="padding-left:10px;padding-right:10px">
    <label class="form-label" for="form2Example2">Nama Pembeli</label>
    <input type="text" name="nama" id="form2Example2" class="form-control">
    
  </div>
    
  <!-- <div class="tooltipshop">Не вписан артикул</div>
  <div class="tooltipshop2">Выберите товар</div> -->
  <div class="app-body">
    <ul class="list">       
    </ul>
    
  </div>
    <div class="openpopup">
<button type="submit" class="btn btn-primary">Check out</button>
</div>
 <div class="openpopup2">
Clear Cart
</div>
 </div>

 </form>

              

      </div>
      
    </section><!-- End Our Portfolio Section -->

    <div id="tray">
  <div class="count">

    </div>
<i class="fa fa-shopping-basket fa-2x" aria-hidden="true"></i>
 </div>
    

 
    

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="contact-about">
              <h3>Amoeba</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info">
              <div>
                <i class="bi bi-geo-alt"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="bi bi-envelope"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="bi bi-phone"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12">


            

            <br>

            <form action="{{ url('/kirim_pesan') }}" method="post" role="form">
              @csrf
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <br>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->


</div>
</div>

    <!-- ======= Map Section ======= -->
    <section class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3024.2219901290355!2d-74.00369368400567!3d40.71312937933185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a23e28c1191%3A0x49f75d3281df052a!2s150%20Park%20Row%2C%20New%20York%2C%20NY%2010007%2C%20USA!5e0!3m2!1sen!2sbg!4v1579767901424!5m2!1sen!2sbg" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </section><!-- End Map Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
 <script  src="{{ asset('/js/script.js') }}"></script>

</body>

</html>

