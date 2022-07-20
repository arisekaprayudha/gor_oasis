@extends('layout.template')
@section('title','Add Arsip')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Add Index</h3>
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

    <form role="form" action="/index" method="post">
        @csrf
        <div class="box-body">

            <div class="form-group row mt-2 {{$errors->has('index') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Index :</label>
                <div class="col-sm-8">
                    <input type="text" name="index" value="{{ old('index') }}"  class="form-control" id="index" placeholder="Name Index">
                @if ($errors->has('index'))
                <span class="help-block">
                <strong>{{ $errors->first('index') }}</strong>
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

            <div class="form-group row mt-2 {{$errors->has('unitkerja_id') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Unit Kerja :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" value="{{ old('unitkerja_id') }}"  id="category_id" name="unitkerja_id" placeholder="Select Unit Kerja" style="width: 100%;">
                        <option value="">Select Unit Kerja</option>
                        @foreach($unitkerja as $item)
                        <option value="{{ $item->id }}" {{old('unitkerja_id') == $item->id ? "selected" : ""}}>{{ $item->unitkerja }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('unitkerja_id'))
                    <span class="help-block">
                    <strong>{{ $errors->first('unitkerja_id') }}</strong>
                    @endif
                </div>
            </div>

            <div class="pull-right">
            <div class="box-footer">
            <a href="/index" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

    </div>

</form>
</div>

@endsection