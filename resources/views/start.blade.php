<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medical program</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('ninestars/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('ninestars/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('ninestars/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('ninestars/assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('ninestars/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Template Main CSS File -->
  <link href="{{asset('ninestars/assets/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
  <!-- =======================================================
  * Template Name: Ninestars - v4.6.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Медична программа</span></a></h1>

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
    </div>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
           <!--  @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                @endif -->
            </div>
  </header><!-- End Header -->
<!-- Блок с выводом ошибок -->
@if ($errors->any())
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
      @foreach ($errors->all() as $error)

        @if ($errors->has('password'))
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не вказано назва операції</li>
        @endif
        @if ($errors->has('id'))
          <li>  <i class="bi bi-exclamation-octagon me-1"></i> Не обрано напрямок </li>
        @endif
      @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
  @endif
  <!-- ======= Hero Section ======= -->
  <div id="app">
  <section id="hero" class="d-flex align-items-center">
   <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 class="mb-4">Авторизуйтеся !</h1>
            <div class="col-lg-10 mt-5 mt-lg-0 d-flex align-items-stretch card card-body" data-aos="fade-up" data-aos-delay="200">
                <h2>Вхід до программи</h2>
                 <form method="POST" action="{{ route('login') }}">
                        @csrf
                  <div class="form-group col-md-8 mb-3">
                  <select class="form-control" name="id" id="id" required autocomplete="ids">
                    <option >Оберіть ПІБ</option>
                       @foreach($user as $item)
                          <option value="{{$item->id}}">{{$item->fullname}}</option>
                       @endforeach
                  </select>
                      @error('id')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                  <div class="form-group col-md-8 mt-3 mt-md-0">
                   <input type="text" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">

                   @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
               <button class="btn-get-started scrollto">Get Started</button>
           </div>
        </div>
      </form>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{asset('ninestars/assets/img/hero-img.svg')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

</div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4 pt-5">
      <div class="copyright">
        &copy; <strong><span>Program medical</span></strong>.All you need is love
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('ninestars/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('ninestars/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('ninestars/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('ninestars/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('ninestars/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('ninestars/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('ninestars/assets/js/main.js')}}"></script>

</body>

</html>
