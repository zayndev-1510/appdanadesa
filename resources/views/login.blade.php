<!doctype html>
<html ng-app="homeApp" class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Akun</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/design.css') }}">

    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/error.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>


    <!-- start chart js -->
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>
<style>
    .login-form-head{
        background-color: white;
    }
</style>
<body ng-controller="homeController">
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form ng-submit="loginAkun()" method="POST">
                    @csrf
                    <div class="login-form-head">
                        <img src="{{ asset('other/logo.jpg') }}" class="img-responsive" style="width: 150px;height:150px;">
                    </div>
                    <div class="login-form-body" style="margin-top: -50px;">
                        <h4 class="text-center" style="margin-bottom: 20px;">{{$message}}</h4>

                            <div class="form-gp">

                                <label for="username">Username</label>
                                <input type="username" name="username" id="username" class="form-login" ng-model="username" oninput="changeBorder(event,1)">
                                <i class="ti-user"></i>
                                <div class="text-danger errormessage"></div>
                            </div>
                            <div class="form-gp">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" ng-model="password" class="form-login" oninput="changeBorder(event,2)">
                                <i class="ti-lock"></i>
                                <div class="text-danger errormessage"></div>
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
          var URL_API="<?php echo getenv("URL_API");?>";
    </script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/admin/login/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/login/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>

</body>

</html>
