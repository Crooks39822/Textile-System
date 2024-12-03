<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{!empty($header_title) ? $header_title : ''}} - Mtfombeni Investments</title>
    @php 
$getHeaderSetting = App\Models\Setting::getSingle();
    @endphp
    <link href="{{ $getHeaderSetting->getFavicon()}}" rel="icon" type="image/jpg"/>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper" id="wrapper_1" style="position:relative">
  <!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ asset('backend/dist/img/dd.png') }}" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>
   


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @php
    $MessageCountAll = App\Models\Chat::MessageCountAll();
    @endphp

  <li class="nav-item dropdown">
        <a class="nav-link"  href="{{ url('chat') }}">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">{{ !empty($MessageCountAll) ? $MessageCountAll : ''}}</span>
        </a>
        
      </li>


  </ul>

</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  

  <a href="#" class="brand-link" style="text-align: center;">
   @if(!empty($getHeaderSetting->getLogo()))
    <img  src="{{ $getHeaderSetting->getLogo()}}" style="width: auto; height: 60px;border-radius:5px;">
@else
    <span class="brand-text font-weight-light">School</span>
    @endif
  </a>
