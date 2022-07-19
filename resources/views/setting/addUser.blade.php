@extends('layout.template')
@section('title','Add User')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Add User</h3>
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

    <form role="form" action="/user" method="post">
        @csrf
        <div class="box-body">

            <div class="form-group row mt-2 {{$errors->has('name') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Name :</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
                @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                @endif
                </div>
            </div>   
            
            <div class="form-group row mt-2 {{$errors->has('nip') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">NIP :</label>
                <div class="col-sm-8">
                    <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP">
                @if ($errors->has('nip'))
                <span class="help-block">
                <strong>{{ $errors->first('nip') }}</strong>
                @endif
                </div>
            </div>   
          
            <div class="pull-right">
            <div class="box-footer">
            <a href="/user" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

    </div>

</form>
</div>

@endsection