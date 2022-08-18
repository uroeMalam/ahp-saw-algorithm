 <!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>SPK Penentuan DPL KKN UNIMAL </title>
   <link href="{{ asset('template')}}/assets/datatables.net-bs4/css/dataTables.bootstrap4.css'" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets\libs\sweetalert2\dist\sweetalert2.min.css') }}">
  <!-- Favicon -->
   <link rel="icon" href="{{asset('template')}}/assets/img/brand/favicon.png" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="{{asset('template')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{asset('template')}}/assets/css/argon.css?v=1.1.0" type="text/css">
 </head>


 <body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-midle">
        <a class="navbar-brand" href="#">
        <h6 class="h2 d-inline-block mb-0">SPK AHP-SAW</h6>

        {{-- <span class="brand-text ml-3 font-weight-light">SISTEM PAKAR</span> --}}

          {{-- <img src="{{asset('template')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="..."> --}}
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/') ? 'active':''}}" href="{{('/')}}">
                <i class="fas fa-fw fa-home text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ Request::is('kriteria') ? 'active':''}}" href="{{('kriteria')}}">
                <i class="fas fa-fw fa-cube text-success"></i>
                <span class="nav-link-text">Data Kriteria</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ Request::is('nilaiahp') ? 'active':''}}" href="{{('nilaiahp')}}">
                <i class="fas fa-fw fa-edit text-success"></i>
                <span class="nav-link-text">Bobot Preferensi AHP</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Request::is('Hasilahp') ? 'active':''}}" href="{{('Hasilahp')}}">
                <i class="fas fa-fw fa-calculator text-success"></i>
                <span class="nav-link-text">Hasil Pehitungan AHP</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ Request::is('subkriteria') ? 'active':''}}" href="{{('subkriteria')}}">
                <i class="fas fa-fw fa-cubes text-info"></i>
                <span class="nav-link-text">Data Sub Kriteria</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('alternatif') ? 'active':''}}" href="{{('alternatif')}}">
                <i class="fas fa-fw fa-users text-info"></i>
                <span class="nav-link-text">Data Alternatif</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('penilaian') ? 'active':''}}" href="{{('penilaian')}}">
                <i class="fas fa-fw fa-edit text-info"></i>
                <span class="nav-link-text">Penilaian SAW</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('hasilAkhir') ? 'active':''}}" href="{{('hasilAkhir')}}">
                <i class="fas fa-fw fa-calculator text-info"></i>
                <span class="nav-link-text">Hasil Akhir</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true"></span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('template')}}/assets/img/theme/react.jpg">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
                </div>
              </a>
              
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 d-inline-block mb-0">SPK Penentuan DPL KKN UNIMAL</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Header -->

    <!-- Page content  -->
    <div class="container-fluid">
      @yield('content')
    </div>
    <!-- page tampilan  -->
    @extends('layout/modal')
      <!-- Footer -->
      <div class="container mx-3">
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center text-lg-left text-muted">
              &copy; 2022 <a href="#" class="font-weight-bold ml-1">SPK AHP-SAW Penentuan DPL KKN UNIMAL</a>
            </div>
          </div>
        </div>
      </footer>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('template')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="{{asset('template')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="{{asset('template')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="{{asset('template')}}/assets/js/argon.js?v=1.1.0"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('dist\js\my-script.js') }}"></script>

  <script src="{{ asset('template')}}/assets/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="{{ asset('dist\js\datatable\datatable-basic.init.js') }}"></script>

  <script src="{{asset('template')}}/assets/js/demo.min.js"></script>
<script src="{{ asset('assets\libs\sweetalert2\dist\sweetalert2.min.js') }}"></script>
<!-- java scripts punya cerita -->
  @stack('page-scripts')
</body>

</html>