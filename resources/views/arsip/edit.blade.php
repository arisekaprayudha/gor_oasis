@extends('layout.template')
@section('title','Edit arsip')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Arsip</h3>
    </div>

        <form  class="form-horizontal" role="form" action="{{ url('arsip/'.$arsip->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="box-body">
        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Kode Pelaksanaan :</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="nomerPelaksana" type="text" value="{{ $arsip->nomerPelaksana}}" >
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Index:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="index" type="text" value="{{ $arsip->index}}" >
            </div>
        </div>

    </div>

        <div class="modal-footer">
            <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>

</div>
@endsection