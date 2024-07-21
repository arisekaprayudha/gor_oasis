@extends('layout.template')
@section('title','Edit Klasifikasi')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Klasifikasi</h3>
    </div>

        <form  class="form-horizontal" role="form" action="{{ url('klasifikasi/'.$klasifikasi->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="box-body">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Sub Code:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="subcode" type="text" value="{{ $klasifikasi->subcode}}" >
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Klasifikasi:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="klasifikasi" type="text" value="{{ $klasifikasi->klasifikasi}}" >
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