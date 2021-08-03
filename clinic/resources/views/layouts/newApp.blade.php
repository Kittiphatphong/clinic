<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yield('title') </title>

    <meta name="description" content="Page with empty content" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!-- Font Awesome -->
    <!--  http://fordev22.com/ -->

    <!-- Ionicons -->

    <!-- iCheck for checkboxes and radio inputs -->
    <!-- http://fordev22.com/ -->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Select2 -->
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />





    <style>
        @font-face {
            font-family: 'noto';
            src: url("{{asset('assets/NotoSansLao-Bold.ttf')}}");
        }
        body {
            font-family: noto;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">



<!-- Site wrapper -->
<div class="wrapper">
    <nav class="main-header  navbar navbar-expand navbar-navy navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link active"  href="{{route('dashboard')}}"><i class="fas fa-home"></i> ໜ້າ​ຫຼັກ</a>
            </li>

        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">


                    <form method="POST" action="{{ route('logout') }}" >
                        @csrf

                        <x-dropdown-link :href="route('logout')" class="nav-link"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fa fa-power-off"></i>  ອອກ​ຈາກ​ລະ​ບົບ
                        </x-dropdown-link>
                    </form>


            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-light-navy elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link bg-navy">
            <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">ຄີ​ນິກ​ປົວ​ແຂ້ວ</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('assets/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="http://devtai.com/" target="_bank" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>




            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <!-- nav-compact -->
                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">ເມ​ນູ</li>

                    <li class="nav-item " >
                        <a href="{{route('order-register.index')}}" class="nav-link  @isset($order_registers) active @endisset">
                            <i class="nav-icon fas fa-clock"></i>
                            <p>ຈອງ​ຄິ​ວ</p>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a href="{{route('service.index')}}" class="nav-link  @isset($list_services) active @endisset">
                            <i class="nav-icon fas fa-concierge-bell"></i>
                            <p>ການ​ບໍ​ລິ​ການ</p>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a href="{{route('medicine.index')}}" class="nav-link  @isset($list_medicines) active @endisset">
                            <i class="nav-icon fas fa-capsules"></i>
                            <p>ຂໍ້​ມູນ​ຢາ </p>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a href="{{route('user.index')}}" class="nav-link  @isset($list_users) active @endisset">
                            <i class="nav-icon fas fa-user"></i>
                            <p>ຜູ້​ໃຊ້ </p>
                        </a>
                    </li>
                    <li class="nav-item " >
                        <a href="{{route('client.index')}}" class="nav-link  @isset($list_clients) active @endisset">
                            <i class="nav-icon fas fa-address-card"></i>
                          <p>ລູກ​ຄ້າ</p>
                        </a>
                    </li>



                    <div class="user-panel mt-2 pb-3 mb-2 d-flex">

                    </div>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" >
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="nav-link text-danger"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="nav-icon fas fa-power-off text-danger"></i>  ອອກ​ຈາກ​ລະ​ບົບ
                            </x-dropdown-link>
                        </form>
                    </li>




                </ul>
            </nav>

            <!-- /.sidebar-menu -->
            <!-- http://fordev22.com/ -->
        </div>
        <!-- /.sidebar -->
    </aside>
    @if (Session::has('success') || Session::has('warning'))
        <div class="fixed-bottom mr-4 mb-14">
            <div class="alert @if(Session::has('success')) alert-success @else alert-danger @endif alert-block float-right mb-4 py-4 col-3" id="message_id">
                <button type="button" class="close pl-4" data-dismiss="alert"><i class="fas fa-window-close text-dark"></i></button>
                <strong>@if(Session::has('success')) {{ Session::get('success') }} @else {{ Session::get('warning') }} @endif</strong>
            </div>
        </div>
    @endif

    @if($errors->any())

        <div class="fixed-bottom mr-4 mb-14">
            <div class="alert alert-danger alert-block  float-right mb-4 col-3" id="message_id" >
                <button type="button" class="close" data-dismiss="alert"><i class="fas fa-window-close text-dark"></i></button>
                @foreach($errors->all() as $error)
                    <p><strong>{{$error}}</strong></p>
                @endforeach
            </div>
        </div>
    @endif



    @yield('content')
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    @if (Session::has('success') || Session::has('warning') || $errors->any())
        <script>
            $("document").ready(function(){
                setTimeout(function(){
                    $("#message_id").fadeToggle();
                }, 3600 );
            });
        </script>
@endif
    <!-- Content Wrapper. Contains page content -->

    <!-- /.col -->
</div>
</section>
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>


<!-- Bootstrap 4 -->
<!-- http://fordev22.com/ -->

<!-- DataTables -->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/datatables/data-sources/html.js')}}"></script>
<!--end::Page Scripts-->
<script src="{{asset('assets/plugins/bootstrap-tagsinput/tagsinput.js?v=1')}}"></script>
<!-- Select2 -->
<!-- http://fordev22.com/ -->
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- http://fordev22.com/ -->

<script src="{{asset('assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
<script src="{{asset('assets/js/pages/crud/forms/widgets/jquery-mask.js')}}"></script>

<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>

</body>
</html>
