@extends('layout.template')
@section('title','Edit Index')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Index</h3>
    </div>

        <form  class="form-horizontal" role="form" action="{{ url('index/'.$index->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="box-body form-horizontal">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Sub Code:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="subcode" type="text" value="{{ $index->subcode}}" >
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Klasifikasi :</label>
            <div class="col-lg-3">
                <select class="form-control select2" id="klasifikasi_id" name="klasifikasi_id" value="{{ $index->klasifikasi->klasifikasi }}" placeholder="Role" style="width: 100%;">
                <option value="">Select Klasifikas</option>
                @foreach($klasifikasi as $item)
                <option value="{{ $item->id }}" {{ $item->id == $index->klasifikasi->id  ? "selected" : ""}}>{{ $item->klasifikasi }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Index:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="index" type="text" value="{{ $index->index}}" >
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