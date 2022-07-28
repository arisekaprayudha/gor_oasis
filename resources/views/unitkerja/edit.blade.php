@extends('layout.template')
@section('title','Edit Unit Kerja')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Unit Kerja</h3>
    </div>

        <form  class="form-horizontal" role="form" action="{{ url('unitkerja/'.$unitkerja->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="box-body form-horizontal">

        {{-- <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Sub Code:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="subcode" type="text" value="{{ $unitkerja->subcode}}" >
            </div>
        </div> --}}

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Unit Kerja:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="unitkerja" type="text" value="{{ $unitkerja->unitkerja}}" >
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