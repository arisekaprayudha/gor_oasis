@extends('layout.template')
@section('title','Add Role')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Add Role</h3>
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

    <form role="form" action="/role" method="post">
        @csrf
        <div class="box-body">

            <div class="form-group row mt-2{{$errors->has('user_id') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Name Employee :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" id="user_id" name="user_id" placeholder="User" style="width: 100%;">
                    <option value="">Name Employee</option>
                    @foreach($user  as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('user_id'))
                <span class="help-block"><strong>{{ $errors->first('user_id') }}</strong></span>
                @endif
                </div>
            </div>    
            
            <div class="form-group row mt-2{{$errors->has('role_id') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Name Role :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" id="role_id" name="role_id" placeholder="Role" style="width: 100%;">
                    <option value="">Select Role</option>
                    @foreach($role  as $item)
                    <option value="{{ $item->id }}">{{ $item->nameRole }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
                <span class="help-block"><strong>{{ $errors->first('role_id') }}</strong></span>
                @endif
                </div>
            </div>    
          
            <div class="pull-right">
            <div class="box-footer">
            <a href="/role" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

    </div>

</form>
</div>

@endsection