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

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/tampilan_awal') }}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/tampilan_awal') }}">Menu</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/pesanan') }}">Pesanan</a></li>
          <li class="dropdown">
            <a href="#">
              {{-- <img width="80px" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png" class="rounded"> --}}
              <img width="60px" src="{{ asset('/storage/user/'.$foto) }}" class="rounded">
              <i class="bi bi-chevron-down"></i>
          </a>
            <ul>
              <li><a href="{{ url('/profile') }}">Edit Profile</a></li>
              <li><a href="{{ url('/password') }}">Ganti Password</a></li>
              <li><a href="{{ url('/logout') }}">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End #header -->

  <main id="main">
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Menu</li>

              @if ($errors->has('message_success'))
  
              <div class="p-4 bg-success border border-success-subtle rounded-3">
                <strong>{{ $errors->first('message_success') }}</strong>
              </div>
              @endif

              @if ($errors->has('message'))
              <div class="p-4 bg-danger border border-danger-subtle rounded-3">
                <strong>{{ $errors->first('message') }}</strong>
              </div>
              @endif

              <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama Pembeli</th>
                  <th scope="col">Nama Menu</th>
                  <th scope="col">Aksi</th>
                  <th scope="col">Status</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach ($pesan as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <th scope="row" >{{ $item->nama_pembeli }}</th>
                  <th scope="row" >{{ $item->nama_menu }}</th>
                  <th scope="row" >
                    @if ($item->status == 0)
                    <a href="{{ url('/update_status/'.$item->id) }}"><button type="button" class="btn btn-primary">Pesanan siap</button></a>
                    @endif

                    @if ($item->status == 1)
                    <a href="{{ url('/ambil_pesan/'.$item->id) }}"><button type="button" class="btn btn-primary">Pesanan sudah diambil</button></a>
                    @endif

                  </th>
                  <th scope="row" >
                    @if ($item->status == 0)
                    <div class="alert alert-danger" role="alert">
                      Sedang Diproses
                    </div>
                    @else
                    <div class="alert alert-primary" role="alert">
                      Pesanan Ready
                    </div>

                    @if ($item->status == 2)
                    <div class="alert alert-primary" role="alert">
                      Pesanan sudah diambil
                    </div>
                        
                    @endif
                  </th>
                  
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </li>
        </ul>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container"  >
      
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

</body>

</html>