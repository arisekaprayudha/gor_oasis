@extends('layout.template')
@section('title','Edit User')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit User</h3>
    </div>

    <form class="form-horizontal" role="form" action="{{ url('user/'.$user->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="box-body">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Name :</label>
            <div class="col-sm-8">
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="name" placeholder="Nama">
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Password :</label>
            <div class="col-sm-8">
                <input type="password" name="password" value="{{ $user->password }}" class="form-control" id="password" placeholder="Password">
            </div>
        </div>
    </div>

        <div class="modal-footer">
            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>

</div>

@endsection