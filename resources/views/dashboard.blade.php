@extends('layout.template')
@section('title','Dashboard')

{{-- @if(session('succes'))
    <div class="alert alert-success" role="alert">
    {{session('succes')}}
    </div>
@endif --}}

@section('content')
@if(session('succes'))
<div class="alert alert-success" role="alert">
    {{session('succes')}}
</div>
@endif

<div class="box">
    <div class="box-header">
        <div class="pull-left">

        </div>

        <section class="content">
          <div class="row">
          <div class="col-lg-6 col-xs-12">

            <div class="small-box bg-green">
            <div class="inner">
            <p>TOTAL MURID</p>
             <h3>10<sup style="font-size: 20px"></sup></h3>
            {{-- <h3>{{ $total_bobot }}<sup style="font-size: 20px"></sup></h3> --}}
            
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/training" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
            </div>

            <div class="col-lg-6 col-xs-12">

              <div class="small-box bg-green">
              <div class="inner">
              <p>TOTAL DATA PELATIH</p>
              <h3>2<sup style="font-size: 20px"></sup></h3>
              {{-- <h3>{{ $total_testing }}<sup style="font-size: 20px"></sup></h3> --}}
              </div>
              <div class="icon">
              <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/testing" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
              </div>
              </div>
      </section>
        
    </div>

    <div class="card">
      <div class="card-header">
      <h3 class="card-title">Hasil Perankingan</h3>
      </div>
      
      <div class="card-body p-0">
      <table class="table table-striped">
      <thead>
      <tr>
      <th style="width: 10px">No</th>
      <th>Nama</th>
      <th>Total Perhitungan SAW</th>
      <th style="width: 40px">Ranking</th>
      </tr>
      </thead>
      <tbody>
        
         
      <tr>
      <td>1.</td>
      <td>Rafida Raudina</td>
      <td>16,25</td>
      <td>1</td>
      </tr>
      <tr>
      <td>2.</td>
      <td>Muhammad Dimas</td>
      <td>14</td>
      <td>2</td>
      </tr>
      <tr>
      <td>3.</td>
      <td>Adam Prakoso</td>
      <td>13,50</td>
      <td>3</td>
      </tr>
      <tr>
      <td>4.</td>
      <td>Bayu Widyanto</td>
      <td> 13,25 </td>
      <td>4</td>
      </tr>
      <tr>
        <td>5.</td>
        <td>Salsabila Yasmin</td>
        <td>12,75</td>
        <td>5</td>
      </tr>
      <tr>
        <td>6.</td>
      <td>Teguh Purnomo</td>
      <td>11,75</td>
      <td>6</td>
      </tr>
      <tr>
      <td>7.</td>
      <td>Anisa Cantika</td>
      <td>11</td>
      <td>7</td>
      </tr>
      <tr>
      <td>8.</td>
      <td>Aditya Pradika</td>
      <td>10,5</td>
      <td>8</td>
      </tr>
      <tr>
      <td>9.</td>
      <td>Nabila Putri</td>
      <td>9,75 </td>
      <td>9</td>
      </tr>
      <tr>
        <td> 10.</td>
        <td>Abdul Fajar</td>
        <td>9 </td>
        <td>10</td>
        </tr>
      </tbody>
      </table>
      </div>
      
      </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

@endsection
