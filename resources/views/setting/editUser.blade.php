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
            <label class="col-sm-3 control-label">NIP :</label>
            <div class="col-sm-8">
                <input type="text" name="nip" value="{{ $user->nip }}" class="form-control" id="nip" placeholder="NIP">
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Unit Kerja :</label>
            <div class="col-lg-3">
                <select class="form-control select2" id="role_id" name="role_id" value="{{ $user->unitkerja->unitkerja }}" placeholder="Role" style="width: 100%;">
                <option value="">Select Unit Kerja</option>
                @foreach($unitkerja as $item)
                <option value="{{ $item->id }}" {{ $item->id == $user->unitkerja->id  ? "selected" : ""}}>{{ $item->unitkerja }}</option>
                @endforeach
                </select>
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
        {{-- <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Category name :</label>

              <div class="col-sm-10">
                <input class="form-control select2" type="text" value="{{ $category->nameCategory }}" disabled>
              </div> --}}    
        </form>

        {{-- <div class="form-group">
            <label for="categoryTraining">Name Category :</label>
            <input type="text" name="categoryTraining" value="$category->nameCategory" class="form-control" id="categoryTraining" placeholder="Nama Category Training">
        </div>   
        </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>

    </form> --}}
</div>

@endsection