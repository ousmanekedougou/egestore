
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ page_title($title ?? '') }}</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
     @if (AuthLogedNow())
     <link class="rounded-circle" rel="apple-touch-icon" sizes="180x180" href="@if(AuthLogedNow()->logo == '') https://ui-avatars.com/api/?name={{AuthLogedNow()->name}} @else {{(Storage::url(AuthLogedNow()->logo))}} @endif">
     <link class="rounded-circle" rel="icon" type="image/png" sizes="32x32" href="@if(AuthLogedNow()->logo == '') https://ui-avatars.com/api/?name={{AuthLogedNow()->name}} @else {{(Storage::url(AuthLogedNow()->logo))}} @endif">
     <link class="rounded-circle" rel="icon" type="image/png" sizes="16x16" href="@if(AuthLogedNow()->logo == '') https://ui-avatars.com/api/?name={{AuthLogedNow()->name}} @else {{(Storage::url(AuthLogedNow()->logo))}} @endif">
     <link class="rounded-circle" rel="shortcut icon" type="image/x-icon" href="@if(AuthLogedNow()->logo == '') https://ui-avatars.com/api/?name={{AuthLogedNow()->name}} @else {{(Storage::url(AuthLogedNow()->logo))}} @endif">
     <link class="rounded-circle" rel="manifest" href="@if(AuthLogedNow()->logo == '') https://ui-avatars.com/api/?name={{AuthLogedNow()->name}} @else {{(Storage::url(AuthLogedNow()->logo))}} @endif">
     <meta class="rounded-circle" name="msapplication-TileImage" content="@if(AuthLogedNow()->logo == '') https://ui-avatars.com/api/?name={{AuthLogedNow()->name}} @else {{(Storage::url(AuthLogedNow()->logo))}} @endif">
     @else
     <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicons/apple-touch-icon.png')}}">
     <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicons/favicon-32x32.png')}}">
     <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicons/favicon-16x16.png')}}">
     <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicons/favicon.ico')}}">
     <link rel="manifest" href="{{asset('assets/img/favicons/manifest.json')}}">
     <meta name="msapplication-TileImage" content="{{asset('assets/img/favicons/mstile-150x150.png')}}">
     @endif

    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('vendors/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <link href="{{asset('vendors/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/dropzone/dropzone.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/glightbox/glightbox.min.css')}}" rel="stylesheet">
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="{{asset('vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/unicons.css')}}">
    <link href="{{asset('assets/css/theme-rtl.min.css')}}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{asset('assets/css/theme.min.css')}}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{asset('assets/css/user-rtl.min.css')}}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('assets/css/user.min.css')}}" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
    <link href="{{asset('vendors/leaflet/leaflet.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/leaflet.markercluster/MarkerCluster.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/leaflet.markercluster/MarkerCluster.Default.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
  </head>