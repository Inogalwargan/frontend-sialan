<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('adminlight/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{url('adminlight/assets/img/favicon.html')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SIDISNAL - PT. WINGS SURYA</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="_token" content="{{csrf_token()}}" />
    
    <!--     Fonts and icons     -->

   {{--  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
   
    <link rel="stylesheet" href="{{url('adminlight/assets/font-awesome/font-awesome.min.css')}}" />
    <!-- CSS Files -->
    <link href="{{url('adminlight/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('adminlight/assets/css/light-bootstrap-dashboard790f.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{url('adminlight/assets/css/demo.css')}}" rel="stylesheet" />
{{--     <script src="{{url('adminlight/assets/js/core/jquery.3.2.1.min.js')}}"></script> --}}
   
<!-- End Google Tag Manager -->
</head>

<body>
    <div class="wrapper">
       <!-- SIDEBAR -->
       @include('/layouts.sidebar')
       <!-- End SIDEBAR -->
       <div class="main-panel">
        <!-- Navbar -->
        @include('/layouts.header')
        <!-- End Navbar -->
        @yield('content')

        <footer class="footer">
            <div class="container">
                <nav>
                    <p class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="">Ino Galwargan</a>, Made With Love
                    </p>
                </nav>
            </div>
        </footer>               
    </div>
</div>

{{-- <PLUGINS> --}}
    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Style</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Background Image</p>
                        <label class="switch-image">
                            <input type="checkbox" data-toggle="switch" checked="" data-on-color="info" data-off-color="info">
                            <span class="toggle"></span>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <label class="switch-mini">
                            <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                            <span class="toggle"></span>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Fixed Navbar</p>
                        <label class="switch-nav">
                            <input type="checkbox" data-toggle="switch" data-on-color="info" data-off-color="info">
                            <span class="toggle"></span>
                        </label>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <p>Filters</p>
                        <div class="pull-right">
                            <span class="badge filter badge-black" data-color="black"></span>
                            <span class="badge filter badge-azure" data-color="azure"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-orange active" data-color="orange"></span>
                            <span class="badge filter badge-red" data-color="red"></span>
                            <span class="badge filter badge-purple" data-color="purple"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Sidebar Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{url('/adminlight/assets/img/sidebar-1.jpg')}}" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{url('/adminlight/assets/img/sidebar-3.jpg')}}" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{url('/adminlight/assets/img/sidebar-4.jpg')}}" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="{{url('/adminlight/assets/img/sidebar-5.jpg')}}" alt="" />
                    </a>
                </li>
            </ul>
        </div>
    </div>                      
{{-- </END PLUGINS> --}}
</body>
<!--   Core JS Files   -->
<script src="{{url('/adminlight/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{url('/adminlight/assets/js/core/popper.min.js')}}"></script>
<script src="{{url('/adminlight/assets/js/core/bootstrap.min.js')}}"></script>
<!--  Plugin for Switches, full documentation here: https://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{url('adminlight/assets/js/plugins/bootstrap-switch.js')}}"></script>
<!--  Google Maps Plugin    -->
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script> --}}

<!--  Notifications Plugin    -->
<script src="{{url('adminlight/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!--  Share Plugin -->
<script src="{{url('adminlight/assets/js/plugins/jquery.sharrre.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{url('adminlight/assets/js/plugins/moment.min.js')}}"></script>
<!--  DatetimePicker   -->
<script src="{{url('adminlight/assets/js/plugins/bootstrap-datetimepicker.js')}}"></script>
<!--  Sweet Alert  -->
<script src="{{url('adminlight/assets/js/plugins/sweetalert2.min.js')}}"></script>
<!--  Tags Input  -->
<script src="{{url('adminlight/assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
<!--  Sliders  -->
<script src="{{url('adminlight/assets/js/plugins/nouislider.js')}}"></script>
<!--  Bootstrap Select  -->
<script src="{{url('adminlight/assets/js/plugins/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{url('adminlight/assets/js/plugins/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{url('adminlight/assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{url('adminlight/assets/js/plugins/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{url('adminlight/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
<!--  Full Calendar   -->
<script src="{{url('adminlight/assets/js/plugins/fullcalendar.min.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('adminlight/assets/js/light-bootstrap-dashboard790f.js?v=2.0.1')}}" type="text/javascript"></script>
<!-- Light Dashboard DEMO methods, don't include it in your project! -->
<script src="{{url('adminlight/assets/js/demo.js')}}"></script>
<!-- End Facebook Pixel Code -->

@section('js')
@show
</html>
