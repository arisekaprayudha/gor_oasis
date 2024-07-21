@extends('layout.template')
@section('title','Edit Bobot Kriteria')

@section('content')
<div class="box ">

    <div class="container-fluid">
        <div class="row">
        
        <div class="col">
        
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit Bobot Kriteria</h3>
        </div>
        
        
        <form class="form-horizontal" role="form" action="{{ url('bobot/'.$bobot->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="card-body">
        <div class="form-group">
        <label for="nama_kriteria">Nama Kriteria</label>
        <input type="text" class="form-control" name="nama_kriteria" value={{ $bobot->nama_kriteria }} id="nama_kriteria" placeholder="Nama Kriteria">
        </div>
        <div class="form-group">
        <label for="bobot">Bobot</label>
        <input type="number" class="form-control" name="bobot" value={{ $bobot->bobot }} id="bobot" placeholder="Bobot">
        </div>
        
        
        </div>
        
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
        </div>
        </form>
        </div>
        </div>
</div>

@endsection