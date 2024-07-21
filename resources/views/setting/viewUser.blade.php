@extends('layout.template')
@section('title','User Detail')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">User Detail</h3>
    </div>

    <div class="box-body form-horizontal">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Name :</label>
            <div class="col-sm-8">
                <input class="form-control select2" type="text" value="{{$user->name}}" disabled>
            </div>
        </div>

        <div class="pull-right">
        <div class="box-footer">
            <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
        </div>
        </div>
        
    </div>
</div>



@endsection