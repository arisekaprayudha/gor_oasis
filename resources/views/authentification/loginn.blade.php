
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "icon" type = "image/x-icon" href = "{{asset('images/logo e-sip-02_1.svg')}}">
<title>Pelatihan Gor Oasis Bekasi</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css?v=3.2.0')}}">

<script nonce="cef22491-2d49-4b78-9746-f953f70c9147">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body class="hold-transition login-page">
<div class="login-box">

<div class="card card-outline card-primary">

<div class="card-header text-center">
<h2>GOR OASIS</h2>
</div>

<div class="card-body">
  <div class="login-logo">
    <h4>Pelatihan Badminton</h4>
  </div>

    @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

<form action="{{ route('login') }}" method="post">
@csrf

<div class="input-group mb-3">
<input type="text" id="username" name="name" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
</div>
<div class="input-group mb-3">
<input type="password"  name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required autocomplete="current-password" placeholder="Password">
<div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

</div>
<div class="input-group mb-4">
<div class="form-check checkbox">
<input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
<label for="remember">
Remember Me
</label>
</div>
</div>
<div class="social-auth-links text-center mb-3">
<button type="submit"  class="btn btn-default">
    Login 
</button>
</div>

</form>

</div>

</div>

</div>

<script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/dist/js/adminlte.min.js?v=3.2.0')}}"></script>

</body>
</html>


