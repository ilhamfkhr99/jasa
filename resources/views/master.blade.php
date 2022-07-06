<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/vuexy_admin
Renew Support: https://1.envato.market/vuexy_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 11:13:26 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard ecommerce - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="{{ asset('vuexy/vuexy/app-assets/images/ico/apple-icon-120.html') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vuexy/vuexy/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    {{-- <link href="http://fontawesome.io/icons/" rel="stylesheet"> --}}

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/vendors/css/vendors.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/vendors/css/charts/apexcharts.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN VUEXY CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/bootstrap-extended.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/colors.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/components.css') }}" />

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/themes/semi-dark-layout.min.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/pages/dashboard-ecommerce.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/plugins/charts/chart-apex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/vuexy/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!--Header -->
    @include('header')
    <!--End Header -->

    @include('sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
            @yield('content')
            {{-- </section> --}}
<!-- Dashboard Ecommerce ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);"><i class="spinner" data-feather="settings"></i></a><div class="customizer-content">
  <!-- Customizer header -->
  <div class="customizer-header px-2 pt-1 pb-0 position-relative">
    <h4 class="mb-0">Theme Customizer</h4>
    <p class="m-0">Customize & Preview in Real Time</p>

    <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
  </div>

  <hr />

  <!-- Styling & Text Direction -->
  <div class="customizer-styling-direction px-2">
    <p class="font-weight-bold">Skin</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input
          type="radio"
          id="skinlight"
          name="skinradio"
          class="custom-control-input layout-name"
          checked
          data-layout=""
        />
        <label class="custom-control-label" for="skinlight">Light</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input
          type="radio"
          id="skinbordered"
          name="skinradio"
          class="custom-control-input layout-name"
          data-layout="bordered-layout"
        />
        <label class="custom-control-label" for="skinbordered">Bordered</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input
          type="radio"
          id="skindark"
          name="skinradio"
          class="custom-control-input layout-name"
          data-layout="dark-layout"
        />
        <label class="custom-control-label" for="skindark">Dark</label>
      </div>
      <div class="custom-control custom-radio">
        <input
          type="radio"
          id="skinsemidark"
          name="skinradio"
          class="custom-control-input layout-name"
          data-layout="semi-dark-layout"
        />
        <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
      </div>
    </div>
  </div>

  <hr />

  <!-- Menu -->
  <div class="customizer-menu px-2">
    <div id="customizer-menu-collapsible" class="d-flex">
      <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
      <div class="custom-control custom-control-primary custom-switch">
        <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
        <label class="custom-control-label" for="collapse-sidebar-switch"></label>
      </div>
    </div>
  </div>
  <hr />

  <!-- Layout Width -->
  <div class="customizer-footer px-2">
    <p class="font-weight-bold">Layout Width</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input" checked />
        <label class="custom-control-label" for="layout-width-full">Full Width</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input" />
        <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
      </div>
    </div>
  </div>
  <hr />

  <!-- Navbar -->
  <div class="customizer-navbar px-2">
    <div id="customizer-navbar-colors">
      <p class="font-weight-bold">Navbar Color</p>
      <ul class="list-inline unstyled-list">
        <li class="color-box bg-white border selected" data-navbar-default=""></li>
        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
        <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
        <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
      </ul>
    </div>

    <p class="navbar-type-text font-weight-bold">Navbar Type</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input" checked />
        <label class="custom-control-label" for="nav-type-floating">Floating</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input" />
        <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="nav-type-static" name="navType" class="custom-control-input" />
        <label class="custom-control-label" for="nav-type-static">Static</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input" />
        <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
      </div>
    </div>
  </div>
  <hr />

  <!-- Footer -->
  <div class="customizer-footer px-2">
    <p class="font-weight-bold">Footer Type</p>
    <div class="d-flex">
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="footer-type-sticky" name="footerType" class="custom-control-input" />
        <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="footer-type-static" name="footerType" class="custom-control-input" checked />
        <label class="custom-control-label" for="footer-type-static">Static</label>
      </div>
      <div class="custom-control custom-radio mr-1">
        <input type="radio" id="footer-type-hidden" name="footerType" class="custom-control-input" />
        <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
      </div>
    </div>
  </div>
</div>

    </div>
    <!-- End: Customizer-->

    <!-- Buynow Button-->
    <div class="buy-now"><a href="https://1.envato.market/vuexy_admin" target="_blank" class="btn btn-danger">Buy Now</a>

    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
      <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('vuexy/vuexy/app-assets/js/core/app-menu.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/js/core/app.min.js') }}"></script>
    <script src="{{ asset('vuexy/vuexy/app-assets/js/scripts/customizer.min.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {{-- <script src="{{ asset('vuexy/vuexy/app-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script> --}}
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 11:14:04 GMT -->
</html>
