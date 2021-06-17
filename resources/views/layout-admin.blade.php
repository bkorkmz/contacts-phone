<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Yönetim Paneli</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/feather/css/feather.css') }}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome-n.min.css') }}">
    <!-- Chartlist chart css -->
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">

    @yield('css')

</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <!-- [ Header ] start -->
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a href="index.html">
                        <img class="img-fluid" src="{{ asset('admin//assets/images/logo.png') }}"
                             style="max-width: 50%!important;"/>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu icon-toggle-right"></i>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.index') }}" class="waves-effect waves-light" target="_blank">
                                <i class="fa fa-laptop" title="Siteyi Görüntüle"></i>
                            </a>
                        </li>


                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="/uploads/{{ Auth::user()->avatar }} " class="img-radius"
                                         alt="User-Profile-Image">
                                    <span> {{ Auth::user()->name }} </span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu"
                                    data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    @if(Auth::user()->status=="1")
                                        <li>
                                            <a href="{{ route('user.edit', Auth::user()->id) }} ">
                                                <i class="feather icon-user"></i> Profillim
                                            </a>
                                        </li>
                                    @endif
                                        <li>
                                            <a href="{{ route('logout') }}">
                                                <i class="feather icon-log-out"></i> Çıkış
                                            </a>
                                        </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- [ navigation menu ] start -->
                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        <div class="pcoded-inner-navbar main-menu">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="{{ route('manage.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-home"></i>
                                          </span>
                                        <span class="pcoded-mtext">Yönetim Anasayfa</span>
                                    </a>
                                </li>
                            </ul>

{{--                            @if(Auth::user()->status=="1")--}}
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-newspaper"></i>
                                        </span>
                                        <span class="pcoded-mtext">Ajanda Yönetimi</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{ route('rehber.create') }}" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">Rehbere Ekle</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('rehber.index') }}" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">Rehber Listele</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-user"></i>
                                        </span>
                                            <span class="pcoded-mtext">Kullanıcı Yönetimi</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ route('user.create') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kullanıcı Ekle</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kullanıcıları Listele</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

{{--                            @endif--}}


                        </div>
                    </div>
                </nav>
                <!-- [ navigation menu ] end -->
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>Internet Explorer'ın eski bir sürümünü kullanıyorsunuz,
        <br> lütfen bu web sitesine erişmek için aşağıdaki web tarayıcılarından herhangi birine yükseltin.

    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ asset('admin/assets/images/browser/chrome.png') }}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ asset('admin/assets/images/browser/firefox.png') }}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ asset('admin/assets/images/browser/opera.png') }}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ asset('admin/assets/images/browser/safari.png') }}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ asset('admin/assets/images/browser/ie.png') }}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Rahatsızlıktan dolayı özür dileriz!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('admin/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>


<!-- Custom js -->
<script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/vertical/vertical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/script.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>


<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')


@yield('js')

</body>


</html>
