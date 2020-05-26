<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="{{asset('css/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset('css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    {{-- YAJRA DATATABLE --}}
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" type="text/css">
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset('css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset('css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <title>Qurmer Dashboard</title>
    <link rel="icon" href="{{asset('image/dashboard/icon-bj.jpeg')}}">
</head>
@yield('style')
<style>
    .box-radius {
        border-radius: 20px !important;
    }

    .box-shadow {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .actives a {
        color: #0E717E !important;
        font-family: MontserratBold;
        font-weight: bolder;
    }

    .nav-link:hover {
        background-color: #f0f0f0 !important;
        border-radius: 40px !important;
    }

    @font-face {
        font-family: MontserratBold;
        src: url('fonts/MontserratAlternates-Bold.otf');
    }

    .montserratbold {
        font-family: MontserratBold;
    }

    .page-sidebar {
        border-radius: 30px !important;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    @media only screen and (min-width: 768px) {
        .page-sidebar {
            top: 20px;
            bottom: -10px;
            position: absolute;
            border-radius: 30px !important;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
    }

    .page-header {
        background: #fff !important;
    }

    .page-content-wrapper {
        background: #f0f0f0;
        border-radius: 30px !important;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .page-content {
        padding-right: 20px !important;
    }

</style>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top" style="min-height:0;height:65px">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{url('/master')}}">
                    <img src="{{asset('image/dashboard/logo.png')}}" alt="logo" class="logo-default" height = "100px;" width="175px;"
                        style="padding-top:5px" /> </a>
            </div>

            <div style="position: absolute;right:0%;margin-right:20px;margin-top:12px">
                <form action="{{ url('logout') }}" method="POST">
                    @csrf
                    <button class="btn button-logout" type="submit">
                        <i class="fa fa-sign-out" style="margin-right:20px"></i>Logout
                    </button>
                </form>
            </div>
            
            
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            {{-- <a href="javascript:;" style="margin-top:25px" class="menu-toggler responsive-toggler" data-toggle="collapse"
                data-target=".navbar-collapse"><i class="fa fa-bars"></i> </a> --}}
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN PAGE TOP -->
            {{-- <div class="page-top">
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <!-- END HEADER SEARCH BOX -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <form action="{{ url('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn button-logout" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                    <a href="{{ route('logout') }}">
                                    <i class="icon-key"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div> --}}
            <!-- END PAGE TOP -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200" style="padding-top:20px">
                    {{-- <li class="text-center" style="padding:20px 0">
                        <img src="{{asset('image/dashboard/default-profile1.png')}}" width="80px;"
                            style="border-radius:100px;">
                        <h4 style="padding-top:10px;font-weight:bold;color:#0E717E;">{{ Auth::user()->name }}</h4>
                    </li> --}}
                    <li class="nav-item {{ (request()->is('master')) ? 'active' : '' }}">
                        <a href="/master" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'user') ? 'active' : '' }}">
                        <a href="/user" class="nav-link nav-toggle">
                            <i class="icon-users"></i>
                            <span class="title">User</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'surat') ? 'active' : '' }}">
                        <a href="/surat" class="nav-link nav-toggle">
                            <i class="icon-book-open"></i>
                            <span class="title">Surat</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'ayat') ? 'active' : '' }}">
                        <a href="/ayat" class="nav-link nav-toggle">
                            <i class="icon-book-open"></i>
                            <span class="title">Ayat</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'ayat') ? 'active' : '' }}">
                        <a href="/audio" class="nav-link nav-toggle">
                            <i class="icon-earphones"></i>
                            <span class="title">Audio</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'ayat') ? 'active' : '' }}">
                        <a href="/video" class="nav-link nav-toggle">
                            <i class="icon-playlist"></i>
                            <span class="title">Video</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'challenge') ? 'active' : '' }}">
                        <a href="/challenge" class="nav-link nav-toggle">
                            <i class="icon-book-open"></i>
                            <span class="title">Challenge</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'quote') ? 'active' : '' }}">
                        <a href="/quote" class="nav-link nav-toggle">
                            <i class="icon-book-open"></i>
                            <span class="title">Quote</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'task') ? 'active' : '' }}">
                        <a href="/task" class="nav-link nav-toggle">
                            <i class="icon-book-open"></i>
                            <span class="title">Task</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'progress') ? 'active' : '' }}">
                        <a href="/progress" class="nav-link nav-toggle">
                            <i class="icon-book-open"></i>
                            <span class="title">User Progress</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->segment(2) == 'Ranking') ? 'active' : '' }}">
                        <a href="/ranking" class="nav-link nav-toggle">
                            <i class="icon-trophy"></i>
                            <span class="title">Ranking User</span>
                        </a>
                    </li>
                </ul>

                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content" style="padding-top:30px">
                @yield('content')
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->
        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer" style="text-align:center">
        2020 &copy; All Right Reserved
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/js.cookie.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.blockui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('js/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{asset('js/app.min.js')}}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('js/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- DASHBOARD SCRIPTS -->
    <script src="{{asset('js/dashboard.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/morris.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/raphael.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.flot.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" referrerpolicy="origin"></script>
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{asset('js/layout.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/demo.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/quick-sidebar.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/quick-nav.min.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    @yield('script')
    {{-- CUSTOM JS --}}
    <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
</body>

</html>
