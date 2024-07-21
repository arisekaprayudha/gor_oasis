@extends('layout.template')
@section('title','Setting')

{{-- @if(session('succes'))
    <div class="alert alert-success" role="alert">
    {{session('succes')}}
    </div>
@endif --}}

@section('content')
@if(session('succes'))
<div class="alert alert-success" role="alert">
    {{session('succes')}}
</div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data User </h3>
        <div class="pull-right">
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#provider">
                create
            </button> --}}
            <a href="/user/create" class="btn btn-primary btn-flat">
                create
            </a>
            <a href="" type="button" class="btn btn-success btn-flat">
                Export
            </a>
            <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#upload">
                Import
            </button>
            {{-- <a href="/categorytraining/create" class="btn btn-primary btn-flat">
                create
            </a> --}}
        </div>
    </div>
    <div class="box-body table-responsive">
        <table id="table"  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Name User</th>
                <th class="text-center">Action</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($user as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td></td>
                {{-- <td>{{ $item->role }}</td> --}}
                <td class="text-center" width="200px">
                    <a href="{{url('/user/'.$item->id)}}" class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('/user/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    {{-- <a href="" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>  --}}
                    <form action="{{ url('user/'.$item->id) }}" class="inline" method="post" onclick="return confirm('Are you sure want to delete this data?')">
                        @method('delete')
                        @csrf
                                
                        <button type="submit" class="btn btn-sm btn-danger" >
                            <i class="fa fa-trash"></i>
                        </button> 
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody> 
    </table>
    </div>
</div>

@endsection


<!-- Modal -->
<div class="modal fade" id="provider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Add User</h4>
        </div>
        <div class="modal-body">
            <form action="/user" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" class="form-control" placeholder="Full name">
                @if ($errors->has('name'))
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>
        </div>
      </div>
    </div>
  </div> 

  <!-- Modal Upload Import -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Import Category Training</h4>
        </div>
        <div class="modal-body">
            <form action="/user" method="post">
            @csrf
            <div class="form-group">
                <label for="nameCategory">File :</label>
                <input type="file" name="importCategory" class="form-control" id="importCategory">
            </div>   

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </form>
        </div>
      </div>
    </div>
  </div>