<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CoreUI CSS -->
 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
 <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
 <title>Arsip JMTM</title>
 </head>
 <body class="c-app">
 <div class="wrapper d-flex flex-column min-vh-100 bg-light">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar  fixed-top navbar-expand-md py-2 bg-light border-bottom">
      
      <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav nav-pills">
              <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">Beranda</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/login">Pencarian</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link disabled">Tentang</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Direktori
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
  <div id="carouselExampleCaptions" class="carousel slide" data-coreui-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-coreui-target="#carouselExampleCaptions" data-coreui-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-coreui-target="#carouselExampleCaptions" data-coreui-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-coreui-target="#carouselExampleCaptions" data-coreui-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/arsip1.png" class="d-block w-100" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Another example headline.</h1>
          <p>Some representative placeholder content for the second slide of the carousel.</p>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-lg btn-primary" type="submit">cari</button>
            </form>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/arsip2.png" class="d-block w-100" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Another example headline.</h1>
          <p>Some representative placeholder content for the second slide of the carousel.</p>
            <form class="d-flex" role="search">
              {{-- <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Search"> --}}
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-lg btn-primary" type="submit">cari</button>
            </form>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/arsip3.png" class="d-block w-100" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>Another example headline.</h1>
          <p>Some representative placeholder content for the second slide of the carousel.</p>
            <form class="d-flex" role="search">
              {{-- <input type="search" class="form-control" id="exampleFormControlInput1" placeholder="Search"> --}}
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-lg btn-primary" type="submit">cari</button>
            </form>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-coreui-target="#carouselExampleCaptions" data-coreui-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-coreui-target="#carouselExampleCaptions" data-coreui-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <br>

  <div class="panel">
    <div id="chartUnitkerja"></div>
    <div id="chartUnitkerja"></div>
  </div>

  <br>
  <br>
  <br>

  <div class="body flex-grow-1 px-3">
    <div class="container-lg">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-primary">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                    </svg>)</span></div>
                <div>Users</div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart1" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-info">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">$6.200 <span class="fs-6 fw-normal">(40.9%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                    </svg>)</span></div>
                <div>Income</div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart2" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-warning">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                    </svg>)</span></div>
                <div>Conversion Rate</div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3" style="height:70px;">
              <canvas class="chart" id="card-chart3" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
        <div class="col-sm-6 col-lg-3">
          <div class="card mb-4 text-white bg-danger">
            <div class="card-body pb-0 d-flex justify-content-between align-items-start">
              <div>
                <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                    </svg>)</span></div>
                <div>Sessions</div>
              </div>
            </div>
            <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
              <canvas class="chart" id="card-chart4" height="70"></canvas>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
    </div>
  </div>  

    <footer class="row row-cols-5 py-5 my-5 border-top">
      <div class="col">
        <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>
        <img src=# alt="" class="footer-logo">
      </div>
  
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase fw-bold mb-4">Kantor Pusat</h5>
        <p>Gedung C Graha Service Provider, Lantai 1<br>Kantor Pusat PT Jasa Marga (Persero) Tbk.<br>Plaza Tol Taman Mini Indonesia Indah</p>
        <abbr title="Phone Number"></abbr>Jakarta 13550<br>
        <abbr title="Phone Number"></abbr>Telp : 021 – 2983 5858<br>
        <abbr title="Phone Number"></abbr>Fax : 021 – 2281 9474<br>
        <abbr title="Email Address"></abbr>email : cs@jmtm.co.id<br>
      </div>
  
      <div class="col">
        <h5>Section</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
          <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>
    </footer>
</main>
 <!-- Optional JavaScript -->
 <!-- Popper.js first, then CoreUI JS -->
 <script src="https://unpkg.com/@popperjs/core@2"></script>
 <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script>
 // Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());

// Build the chart
Highcharts.chart('chartUnitkerja', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Data Arsip 2019'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            colors: pieColors,
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                distance: -50,
                filter: {
                    property: 'percentage',
                    operator: '>',
                    value: 4
                }
            }
        }
    },
    series: [{
        name: 'Percentage',
        data: [
            { name: 'Direksi', y: 61.41 }
        ]
    }]
});
 </script> 
</body>
</html>

