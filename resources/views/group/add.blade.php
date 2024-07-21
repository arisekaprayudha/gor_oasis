@extends('layout.template')
@section('title','Input Group')

@section('content')

<div class="box ">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <div class="row">
        
        <div class="col">
        
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Input Group</h3>
        </div>
        
        
        <form role="form" action="/user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="nama">Nama Group</label>
                <input type="text" class="form-control" name="name"  id="name" placeholder="Nama">
                </div>
            <div class="form-group">
                <label for="user_id">Pelatih</label>
                <select class="form-control select2" id="user_id" name="user_id" placeholder="Role" style="width: 100%;">
                <option value="">Select Role</option>
                @foreach($teacher as $item)
                    <option value="{{ $item->id }}" {{old('category_id') == $item->id ? "selected" : ""}}>{{ $item->name }}</option>
                @endforeach
                </select>
            </div>
        <div class="form-group">
        <label for="date">Jadwal Pelatihan</label>
        <input type="date" class="form-control" name="date"  id="date" placeholder="Date">
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