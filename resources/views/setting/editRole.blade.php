@extends('layout.template')
@section('title','Edit Role')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Role</h3>
    </div>

    <form class="form-horizontal" action="/role/{{$role->id}}" method="post">
        @method('PUT')
        @csrf

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Role :</label>
            <div class="col-lg-3">
                <select class="form-control select2" id="role_id" name="role_id" placeholder="Role" style="width: 100%;">
                <option value="">Select Role</option>
                @foreach($roles as $item)
                <option value="{{ $item->id }}" {{old('role_id') == $item->id ? "selected" : ""}}>{{ $item->nameRole }}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
</div>

@endsection