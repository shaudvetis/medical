<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medical Program</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('NiceAdmin/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{ asset('fontello/css/fontello.css')}}" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{ asset('NiceAdmin/assets/css/style.css')}}" rel="stylesheet">

  <!-- My css -->
  <link href="{{ asset('mycss/medical.css')}}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   @yield('css')
</head>

<body>


  <!-- ======= Header #A899E3 #6C5BB4 A899E3======= -->
  <header id="header" class="header fixed-top d-flex align-items-center info" style="background-color:#8370DB">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('medical')}}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Medical Programm</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <a href="{{ route('test') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">test</a>
      <h1 class="text-light"><a href="{{asset('calendar-event')}}"><span>Медична программа1</span></a></h1>
<div class="search-bar">
      <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('filter')}}" class="nav-link" style="color:white"> <i class="bi bi-check2-circle"></i> Направлення на госпіталізацію</a>
      </li>
      <div class="dropdown">
      <li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link" style="color:white"><i class="bi bi-check2-circle"></i> Стаціонар</a>
      </li>

       <li class="nav-item d-none d-sm-inline-block">
    <a href="{{route('grpacient')}}" class="nav-link" style="color:white"><i class="bi bi-check2-circle"></i> Графік палат</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3" action="{{route('usersearchs')}}" method="POST">-->
    <!--                {{ csrf_field() }}-->
    <!--            {{ method_field('POST') }} -->
    <!--  <div class="input-group input-group-sm">-->
    <!--    <input class="form-control form-control-navbar" type="date" placeholder="Search" aria-label="data" name="pac_born">-->
    <!--    <div class="input-group-append">-->
    <!--      <button class="btn btn-navbar" type="submit">-->
    <!--        <i class="fas fa-search"></i>-->
    <!--      </button>-->

    <!--  </div>-->
    <!--    <input class="form-control form-control-navbar" type="еуче" placeholder="ФИО пациента" aria-label="data" name="pac_fio">-->
    <!--    <div class="input-group-append">-->
    <!--      <button class="btn btn-navbar" type="submit">-->
    <!--        <i class="fas fa-search"></i>-->
    <!--      </button>-->
    <!--    </div>-->

    <!--    <input class="form-control form-control-navbar" type="text" placeholder="телефон" aria-label="data" name="w-tlph">-->
    <!--    <div class="input-group-append">-->
    <!--      <button class="btn btn-navbar" type="submit">-->
    <!--        <i class="fas fa-search"></i>-->
    <!--      </button>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</form>-->
     <!-- LOGOUT -->
     <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
       <!-- Authentication Links -->
       <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->fullname }}
          </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">  {{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                  </form>
              </div>
        </li>
     </ul>
  </nav>
  <!-- /.navbar -->
</div><!-- End Search Bar -->
</header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Головна сторінка</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <!--<a href="{{route('searchuser')}}" style="font-family: e-Ukraine-Light;font-size:10px;color: #a1a4a8;font-weight: 600;padding-left: 0;padding-right: 0;" class="nav-link">-->
      <!--      Створення фіз.картки<br> паціента <i class="bi bi-person-plus"></i>-->
      <!--   </a>-->
      <li class="nav-item">
        <a class="nav-link collapsed " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
          <i class="bi bi-menu-button-wide"></i><span>Довідники</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('p_payout.index')}}">
              <i class="bi bi-circle"></i><span>Лікувальні напрямки</span>
            </a>
          </li>
          <li>
            <a href="{{route('p_oper.index')}}">
              <i class="bi bi-circle"></i><span>Операції</span>
            </a>
          </li>
          <li>
            <a href="{{route('sodiag.index')}}">
              <i class="bi bi-circle"></i><span>Діагнози</span>
            </a>
          </li>
            <li>
            <a href="{{route('mkb.index')}}">
              <i class="bi bi-circle"></i><span>Довідник МКБ</span>
            </a>
          </li>
         <li>
            <a href="{{route('sprrizki.index')}}">
              <i class="bi bi-circle"></i><span>Ризики</span>
            </a>
          </li>

          <li>
            <a href="{{route('sprdevice.index')}}">
              <i class="bi bi-circle"></i><span>Обладнання унікальне</span>
            </a>
          </li>

          <li>
            <a href="{{route('p_operblock.index')}}">
              <i class="bi bi-circle"></i><span>Оперблоки</span>
            </a>
          </li>
          <li>
            <a  href="{{route('palat.index')}}">
              <i class="bi bi-circle"></i><span>Палати</span>
            </a>
          </li>
          <li>
            <a href="{{route('profile.index')}}">
              <i class="bi bi-circle"></i><span>Працівники</span>
            </a>
          </li>
          <li>
            <a href="{{route('p_dolgn.index')}}">
              <i class="bi bi-circle"></i><span>Посади</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Звіти</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Кількість операцій</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Кількість паціентів</span>
            </a>
          </li>
        </ul>
      </li>
  </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
  @if(isset($_SERVER['REQUEST_URI']) and $_SERVER['REQUEST_URI']== '/medical' )
  <div class="col-12 " style="width:100%">
          <img src="{{asset('picture/site.png')}}" class="img-fluid animated" alt=""  style="width:100%">
        </div>
  @endif
       @yield('content')

</main>

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <!-- jQuery -->
  <script src="{{ asset('myjquery/jquery.min.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('NiceAdmin/assets/js/main.js')}}"></script>
  <script src="{{ asset('js/app.js')}}?v={{env('SCRIPT_VERSION')}}"></script>


 @yield('js')
</body>

</html>
