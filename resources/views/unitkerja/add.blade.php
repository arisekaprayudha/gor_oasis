@extends('layout.template')
@section('title','Add Unit Kerja')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Add Unit Kerja</h3>
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

    <form role="form" action="/unitkerja" method="post">
        @csrf
        <div class="box-body form-horizontal">

            <div class="form-group row mt-2 {{$errors->has('unitkerja') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Nama Unit Kerja :</label>
                <div class="col-sm-8">
                    <input type="text" name="unitkerja" value="{{ old('unitkerja') }}"  class="form-control" id="nameRoom" placeholder="Nama Unit Kerja">
                @if ($errors->has('unitkerja'))
                <span class="help-block">
                <strong>{{ $errors->first('unitkerja') }}</strong>
                @endif
                </div>
            </div> 

            <div class="pull-right">
            <div class="box-footer">
            <a href="/unitkerja" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

    </div>

</form>
</div>

@endsection