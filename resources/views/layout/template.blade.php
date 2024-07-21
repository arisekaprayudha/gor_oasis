<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Dashboard</title>

<link rel="stylesheet" href="{{asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

<link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('template/plugins/jqvmap/jqvmap.min.css')}}">

<link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css?v=3.2.0')}}">

<link rel="stylesheet" href="{{asset('template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

<link rel="stylesheet" href="{{asset('template/plugins/daterangepicker/daterangepicker.css')}}">

<link rel="stylesheet" href="{{asset('template/plugins/summernote/summernote-bs4.min.css')}}">
<script nonce="49c82a05-c173-43f8-9268-87d16b78e50b">(function(w,d){!function(a,b,c,d){a[c]=a[c]||{};a[c].executed=[];a.zaraz={deferred:[],listeners:[]};a.zaraz.q=[];a.zaraz._f=function(e){return async function(){var f=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:f})}};for(const g of["track","set","debug"])a.zaraz[g]=a.zaraz._f(g);a.zaraz.init=()=>{var h=b.getElementsByTagName(d)[0],i=b.createElement(d),j=b.getElementsByTagName("title")[0];j&&(a[c].t=b.getElementsByTagName("title")[0].text);a[c].x=Math.random();a[c].w=a.screen.width;a[c].h=a.screen.height;a[c].j=a.innerHeight;a[c].e=a.innerWidth;a[c].l=a.location.href;a[c].r=b.referrer;a[c].k=a.screen.colorDepth;a[c].n=b.characterSet;a[c].o=(new Date).getTimezoneOffset();if(a.dataLayer)for(const n of Object.entries(Object.entries(dataLayer).reduce(((o,p)=>({...o[1],...p[1]})),{})))zaraz.set(n[0],n[1],{scope:"page"});a[c].q=[];for(;a.zaraz.q.length;){const q=a.zaraz.q.shift();a[c].q.push(q)}i.defer=!0;for(const r of[localStorage,sessionStorage])Object.keys(r||{}).filter((t=>t.startsWith("_zaraz_"))).forEach((s=>{try{a[c]["z_"+s.slice(7)]=JSON.parse(r.getItem(s))}catch{a[c]["z_"+s.slice(7)]=r.getItem(s)}}));i.referrerPolicy="origin";i.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a[c])));h.parentNode.insertBefore(i,h)};["complete","interactive"].includes(b.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="preloader flex-column justify-content-center align-items-center">
<img class="animation__shake" src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
</div>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
</ul>

<ul class="navbar-nav ml-auto">

</ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="index3.html" class="brand-link">
{{--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
<span class="brand-text font-weight-light">OASIS</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{asset('style/dist/img/default-user.jpg')}}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">{{ Auth::user()->name }}</a>
</div>
</div>

<nav class="mt-2">
    @include('layout.navbar')
</nav>

</div>

</aside>

<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">

</div>
</div>
</div>


<section class="content">
<div class="container-fluid">
</div>
@yield('content')
</div>
</section>

</div>

<footer class="main-footer">
  <strong>© 2024 Aris Eka | All rights reserved</strong>
</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('template/plugins/sparklines/sparkline.js')}}"></script>

<script src="{{asset('template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>

<script src="{{asset('template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('template/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('template/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('template/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('template/dist/js/adminlte.js?v=3.2.0')}}"></script>

<script src="{{asset('template/dist/js/demo.js')}}"></script>


<script src="{{asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
</body>
</html>
