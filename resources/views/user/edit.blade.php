@extends('layout.template')
@section('title','Edit User')

@section('content')
<div class="box ">

    <div class="container-fluid">
        <div class="row">
        
        <div class="col">
        
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Edit User</h3>
        </div>
        
        
        <form class="form-horizontal" role="form" action="{{ url('user/'.$user->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        <div class="card-body">
        <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" class="form-control" name="name" value={{ $user->name }} id="name" placeholder="Nama">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select class="form-control select2" id="role" name="role" placeholder="Role" style="width: 100%;">
            <option value="">Select Role</option>
            @foreach($role as $item)
                <option value="{{ $item->id }}" {{old('category_id') == $item->id ? "selected" : ""}}>{{ $item->nameRole }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control select2" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin" style="width: 100%;">
                <option value="P" {{old('typeTest') == "PreTest" ? "selected" : ""}}>Perempuan</option>
                <option value="L" {{old('typeTest') == "PostTest" ? "selected" : ""}}>Laki-laki</option>
            </select>
        </div>
        <div class="form-group">
        <label for="umur">Umur</label>
        <input type="number" class="form-control" name="umur" value={{ $user->umur }} id="umur" placeholder="Umur">
        </div>
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
        </div>
        <label class="col-sm-3 control-label">Alamat : </label>
                <div class="col-sm-8">
                <textarea class="form-control" name="alamat" rows="3" placeholder="Catatan...">{{ old('description') }}</textarea>
                </div>
        
        </div>
        
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
        </div>
        </form>
        </div>
        </div>
</div>

@endsection