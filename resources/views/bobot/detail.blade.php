@extends('layout.template')
@section('title','Detail Bobot Kriteria')

@section('content')


<div class="box ">

    <div class="container-fluid">
        <div class="row">
        
        <div class="col">
        
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Detail Bobot Kriteria</h3>
        </div>
        
        
        <form>
        <div class="card-body">
        <div class="form-group">
        <label for="nama_kriteria">Nama Kriteria</label>
        <input type="text" class="form-control" name="nama_kriteria" value={{ $bobot->nama_kriteria }} id="nama_kriteria" placeholder="Nama Kriteria" disabled>
        </div>
        <div class="form-group">
        <label for="bobot">Bobot</label>
        <input type="number" class="form-control" name="bobot" id="bobot" value={{ $bobot->bobot }} placeholder="Bobot" disabled>
        </div>
        
        
        </div>
        
        <div class="card-footer">
            <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
        </div>
        </form>
        </div>
        </div>
</div>
@endsection