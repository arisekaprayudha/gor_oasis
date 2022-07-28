@extends('layout.template')
@section('title','Add Klasifikasi')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Add Klasifikasi</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form role="form" action="/klasifikasi" method="post">
        @csrf
        <div class="box-body form-horizontal">

            <div class="form-group row mt-2 {{$errors->has('klasifikasi') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Nama Klasifikasi :</label>
                <div class="col-sm-8">
                    <input type="text" name="klasifikasi" value="{{ old('klasifikasi') }}"  class="form-control" id="klasifikasi" placeholder="Nama Klasifikasi">
                @if ($errors->has('klasifikasi'))
                <span class="help-block">
                <strong>{{ $errors->first('klasifikasi') }}</strong>
                @endif
                </div>
            </div>
            
            <div class="form-group row mt-2 {{$errors->has('subcode') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Sub Code :</label>
                <div class="col-sm-8">
                    <input type="text" name="subcode" value="{{ old('subcode') }}"  class="form-control" id="subcode" placeholder="Sub Code">
                @if ($errors->has('subcode'))
                <span class="help-block">
                <strong>{{ $errors->first('subcode') }}</strong>
                @endif
                </div>
            </div> 

            <div class="pull-right">
            <div class="box-footer">
            <a href="/klasifikasi" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

    </div>

</form>
</div>

@endsection