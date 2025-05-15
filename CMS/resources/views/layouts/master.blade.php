<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="https://img.icons8.com/ios-filled/50/virtual-machine2.png" width="48" height="48" >
    <title>VPS Hosting</title>
    <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="../assets/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="{{asset('template/assets/animate.css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('template/assets/glyphicons/glyphicons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('template/assets/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('template/assets/material-design-icons/material-design-icons.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('template/assets/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />
    <!-- build:css ../assets/styles/app.min.css -->
    <link rel="stylesheet" href="{{asset('template/assets/styles/app.css')}}" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="{{asset('template/assets/styles/font.css')}}" type="text/css" />
</head>
<body>
<div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- aside -->
    <div id="aside" class="app-aside modal nav-dropdown">
        <!-- fluid app aside -->
        <div class="left navside dark dk" data-layout="column">
            <div class="navbar no-radius">
                <!-- brand -->
                <a class="navbar-brand">

                <div ui-include="'../assets/images/logo.svg'"></div>
                    <img src="../assets/images/logo.png" alt="." class="hide">
                    <span class="hidden-folded inline"> VPS Hosting </span>
                </a>
                <!-- / brand -->
            </div>
            <div class="hide-scroll" data-flex>
                <nav class="scroll nav-light">

                    <ul class="nav" ui-nav>

                        <li>
                            <a href="{{route('home-page')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Welcome</span>
                            </a>
                            <a href="{{route('Blogs-Index')}}" >
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Our Blogs</span>
                            </a>


                            <a href="{{route('Services-Index')}}">
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">Services</span>
                            </a>

                            <a href="{{route('FAQ-page')}}">
                    <span class="nav-icon">
                      <i class="material-icons">&#xe3fc;
                        <span ui-include="'../assets/images/i_0.svg'"></span>
                      </i>
                    </span>
                                <span class="nav-text">FAQ</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="b-t">
                <div class="nav-fold">
                    <a href="profile.html">

                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- / -->

    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
        <div class="app-header white box-shadow">
            <div class="navbar navbar-toggleable-sm flex-row align-items-center">
                <button  type="submit"  style="margin-left: 1000px;width: auto" class="btn btn-fw black">
                    <a href={{route('home-page')}}>Log In</a>
                </button>
                @if(auth()->user() == true)
                    <form method="post" action="http://127.0.0.1:8000/logout">
                        @csrf
                        <button TYPE="submit" style="margin-left: -237px;width: auto" class="btn btn-fw black">Log Out
                        </button>
                    </form>
                @endif

                <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
                    <i class="material-icons">&#xe5d2;</i>
                </a>
                <!-- / -->

                <!-- Page title - Bind to $state's title -->
                <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

                <!-- navbar collapse -->
                <div class="collapse navbar-collapse" id="collapse">
                    <!-- link and dropdown -->
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item dropdown">

                            <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                        </li>
                    </ul>

                    <div ui-include="'../views/blocks/navbar.form.html'"></div>
                    <!-- / -->
                </div>
                <!-- / navbar collapse -->

                <!-- navbar right -->


                <!-- / navbar right -->
            </div>
        </div>
{{--        <div class="app-footer">--}}
{{--            <div class="p-2 text-xs">--}}
{{--                <div class="pull-right text-muted py-1">--}}
{{--                    &copy; Copyright <strong>Flatkit</strong> <span class="hidden-xs-down">- Built with Love v1.1.3</span>--}}
{{--                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>--}}
{{--                </div>--}}
{{--                <div class="nav">--}}
{{--                    <a class="nav-link" href="../">About</a>--}}
{{--                    <a class="nav-link" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div ui-view class="app-body" id="view">

            <!-- ############ PAGE START-->

            @yield('content')

            <!-- ############ PAGE END-->

        </div>
    </div>
    <!-- / -->



    <!-- ############ LAYOUT END-->

</div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
<script src="{{asset('template//libs/jquery/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('template//libs/jquery/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('template//libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- core -->
<script src="{{asset('template//libs/jquery/underscore/underscore-min.js')}}"></script>
<script src="{{asset('template//libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
<script src="{{asset('template//libs/jquery/PACE/pace.min.js')}}"></script>

<script src="{{asset('template/scripts/config.lazyload.js')}}"></script>

<script src="{{asset('template/scripts/palette.js')}}"></script>
<script src="{{asset('template/scripts/ui-load.js')}}"></script>
<script src="{{asset('template/scripts/ui-jp.js')}}"></script>
<script src="{{asset('template/scripts/ui-include.js')}}"></script>
<script src="{{asset('template/scripts/ui-device.js')}}"></script>
<script src="{{asset('template/scripts/ui-form.js')}}"></script>
<script src="{{asset('template/scripts/ui-nav.js')}}"></script>
<script src="{{asset('template/scripts/ui-screenfull.js')}}"></script>
<script src="{{asset('template/scripts/ui-scroll-to.js')}}"></script>
<script src="{{asset('template/scripts/ui-toggle-class.js')}}"></script>

<script src="{{asset('template/scripts/app.js')}}"></script>

<!-- ajax -->
<script src="{{asset('template/libs/jquery/jquery-pjax/jquery.pjax.js')}}'"></script>
<script src="{{asset('template/scripts/ajax.js')}}"></script>
<!-- endbuild -->
</body>
</html>
