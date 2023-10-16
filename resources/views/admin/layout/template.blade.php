<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SISTEM INFORMASI AKADEMIK TK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('uploads/'.$data->logo_rel) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/design.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/dist/assets/owl.theme.green.min.css') }}">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/datatable/DataTables-1.11.5/css/jquery.dataTables.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/datatable/DataTables-1.11.5/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/datatable/Responsive-2.2.9/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/datatable/Responsive-2.2.9/css/responsive.jqueryui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>


    <!-- start chart js -->
    <script src="{{ asset('assets/datatable/DataTables-1.11.5/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/datatable/DataTables-1.11.5/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/Responsive-2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/datatable/Responsive-2.2.9/js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu" style="background-color: #483D8B;color:white;">
            <div class="sidebar-header" style="background-color: #483D8B;color:white;">
                <div class="logo">

                    <p style="color: white;font-weight: bolder;">{{ $data->title }}</p>

                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            {{-- // Navigation Dashboard --}}
                            <li>
                                <a href="{{ url('admin/dashboard') }}" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            {{--  --}}

                            {{-- // Navigation Data Master --}}
                            <li>
                                <a href="#" aria-expanded="true"><i class="ti-calendar"></i><span> Data Master
                                    </span></a>

                                {{-- // Sub Menu Data Master --}}
                                <ul class="collapse">

                                    {{-- // Data Perangkat Desa --}}
                                    <li>
                                        <a href="{{ url('admin/perangkat-desa') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>Pembelanjaan Desa</span>
                                        </a>
                                        {{-- // Sub Menu Data Master --}}
                                        <ul class="collapse">
                                            {{-- // Menu Data Jabatan --}}
                                            <li>
                                                <a href="{{ url('admin/kelompok-belanja') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Data Kelompok</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('admin/jenis-belanja') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Data Jenis</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('admin/objek-belanja') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Data Objek</span>
                                                </a>
                                            </li>
                                            {{--  --}}

                                        </ul>
                                    </li>

                                    {{-- // Data Perangkat Desa --}}
                                    <li>
                                        <a href="{{ url('admin/perangkat-desa') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>Pendapatan Desa</span>
                                        </a>
                                        {{-- // Sub Menu Data Master --}}
                                        <ul class="collapse">
                                            {{-- // Menu Data Jabatan --}}
                                            <li>
                                                <a href="{{ url('admin/kelompok-pendapatan') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Data Kelompok</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('admin/jenis-pendapatan') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Data Jenis</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('admin/objek-pendapatan') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Data Objek</span>
                                                </a>
                                            </li>
                                            {{--  --}}

                                        </ul>
                                    </li>


                                    {{--  --}}

                                    {{-- // Data Profil Desa --}}
                                    <li>
                                        <a href="{{ url('admin/profil-desa') }}">
                                            <i class="ti-home" aria-hidden="true"></i>
                                            <span>Data Desa</span>
                                        </a>

                                        <ul class="collapse">

                                            {{-- // Menu Data Jabatan --}}
                                            <li>
                                                <a href="{{ url('admin/profil-desa') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Profil</span>
                                                </a>
                                            </li>


                                            {{-- // Menu Data Jabatan --}}
                                            <li>
                                                <a href="{{ url('admin/jabatan') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Jabatan</span>
                                                </a>
                                            </li>
                                            {{--  --}}

                                            {{-- // Data Perangkat Desa --}}
                                            <li>
                                                <a href="{{ url('admin/perangkat-desa') }}">
                                                    <i class="ti-user" aria-hidden="true"></i>
                                                    <span>Perangkat Desa</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    {{--  --}}

                                    <li>
                                        <a href="{{ url('admin/sumber-dana') }}">
                                            <i class="ti-money" aria-hidden="true"></i>
                                            <span>Data Sumber Dana</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('admin/bidang') }}">
                                            <i class="ti-package" aria-hidden="true"></i>
                                            <span>Data Bidang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/sub-bidang') }}">
                                            <i class="ti-package" aria-hidden="true"></i>
                                            <span>Data Sub Bidang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/kegiatan') }}">
                                            <i class="ti-calendar" aria-hidden="true"></i>
                                            <span>Data Kegiatan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/pola-kegiatan') }}">
                                            <i class="ti-calendar" aria-hidden="true"></i>
                                            <span>Data Pola Kegiatan</span>
                                        </a>
                                    </li>
                                </ul>
                                {{--  --}}

                            </li>
                            {{--  --}}

                            {{-- // Navigation Data Pendapatan --}}
                            <li>
                                <a href="#" aria-expanded="true"><i class="ti-calendar"></i><span>Pendapatan
                                    </span></a>
                                <ul class="collapse">
                                    {{-- // Menu Data Jabatan --}}
                                    <li>
                                        <a href="{{ url('admin/rap') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>RAP DESA </span>
                                        </a>
                                    </li>

                                    {{--  --}}

                                </ul>
                            </li>

                            {{-- // Navigation Data Penganggaran --}}
                            <li>
                                <a href="#" aria-expanded="true"><i class="ti-calendar"></i><span>Penganggaran
                                    </span></a>

                                {{-- // Sub Menu Data Master --}}
                                <ul class="collapse">
                                    {{-- // Menu Data Jabatan --}}
                                    <li>
                                        <a href="{{ url('admin/anggaran-kegiatan') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>RAK DESA </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin/detail-kegiatan') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>Detail RAK DESA </span>
                                        </a>
                                    </li>

                                    {{--  --}}

                                </ul>
                                {{--  --}}

                            </li>
                            {{-- // Navigation Data Penganggaran --}}
                            <li>
                                <a href="#" aria-expanded="true"><i class="ti-calendar"></i><span>Laporan
                                    </span></a>

                                {{-- // Sub Menu Data Master --}}
                                <ul class="collapse">
                                    <li>
                                        <a href="{{ url('admin/rap') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>RAP DESA </span>
                                        </a>
                                    </li>
                                    {{-- // Menu Data Jabatan --}}
                                    <li>
                                        <a href="{{ url('admin/anggaran-kegiatan') }}">
                                            <i class="ti-user" aria-hidden="true"></i>
                                            <span>RAB DESA </span>
                                        </a>
                                    </li>

                                    {{--  --}}

                                </ul>
                                {{--  --}}

                            </li>
                            <li>
                                <a href="pengaturan" aria-expanded="true"><i class="ti-settings"></i><span>Pengaturan
                                    </span></a>
                            </li>
                            {{--  --}}

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">

                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">

                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown"></i>

                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">You have 3 new notifications <a href="#">
                                            view all</a></span>
                                    <div class="nofity-list" style="background-color: red;o">
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i>
                                            </div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comments-smiley btn-info"></i>
                                            </div>
                                            <div class="notify-text">
                                                <p>New Commetns On Post</p>
                                                <span>30 Seconds ago</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-primary"></i></div>
                                            <div class="notify-text">
                                                <p>Some special like you</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                        <a href="#" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>You have Changed Your Password</p>
                                                <span>Just Now</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </li>
                            <li class="settings-btn">
                                <i class="ti-settings"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    @yield('header-lvl-1')
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ asset('akun/' . $datalogin->foto) }}"
                                alt="avatar">
                            <h4 class="user-name dropdown-toggle poppins" data-toggle="dropdown">
                                {{ $datalogin->name }}
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item poppins" href="{{ url('logout') }}">Log Out</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- page title area end -->
            @yield('content')
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p class="poppins">© Copyright 2018. All right reserved. Template by <a href="">IT KREATIF</a>.
                </p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>


    <!-- all line chart activation -->

    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        var URL_API = "<?php echo getenv('URL_API'); ?>";
        var URL_FILE = "<?php echo getenv('URL_FILE'); ?>";
        var URL_APP = "<?php echo getenv('URL_APP'); ?>";
    </script>

    @yield('javascript')
</body>

</html>
