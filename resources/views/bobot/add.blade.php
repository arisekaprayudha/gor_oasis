@extends('layout.template')
@section('title','Input Bobot Kriteria')

@section('content')

<div class="box ">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <div class="row">
        
        <div class="col">
        
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Input Bobot Kriteria</h3>
        </div>
        
        
        <form role="form" action="/bobot" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
        <div class="form-group">
        <label for="nama_kriteria">Nama Kriteria</label>
        <input type="text" class="form-control" name="nama_kriteria"  id="nama_kriteria" placeholder="Nama Kriteria">
        </div>
        <div class="form-group">
        <label for="bobot">Bobot</label>
        <input type="number" class="form-control" name="bobot" id="bobot" placeholder="Bobot">
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