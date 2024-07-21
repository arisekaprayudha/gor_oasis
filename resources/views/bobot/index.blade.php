@extends('layout.template')
@section('title','Data Kriteria Bobot')

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
<div class="box ">
  <div class="container-fluid">
      <div class="card">
          <div class="card-header">
            <h3 class="box-title">Data Kriteria Bobot</h3> 
            <a href="/bobot/create" class="btn btn-primary ">
              create
            </a>
            <a href="/exportBobot" type="button" class="btn btn-success">
                Export
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#upload">
                Import
            </button>
          </div>
     
                  <div class="card-body">
                      <table table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="10">
                                    No
                                  </th>
                                  <th>
                                    ID
                                  </th>
                                  <th>
                                    Nama Kriteria
                                  </th>
                                  <th>
                                    Bobot
                                  </th>
                                  <th>
                                    Aksi
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($bobot as $item)
                                  <tr>
                                      <td>
                                        {{ $loop->iteration }}
                                      </td>
                                      <td>
                                        {{ $item->code }}
                                      </td>
                                      <td>
                                        {{ $item->nama_kriteria }}
                                      </td>
                                      <td>
                                        {{ $item->bobot }}
                                      </td>
                                      <td >
                                        <div class="text-center" width="200px">
                                        <a href="{{url('/bobot/'.$item->id)}}" class="btn btn-sm btn-success" >
                                          <i class="fa fa-eye"></i> 
                                      </a>
                                      <a href="{{url('/bobot/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                      {{-- <a href="{{url('/bobot/'.$item->id)}}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a> --}}
                                      <form action="{{ url('bobot/'.$item->id) }}" class="inline" method="post" onclick="return confirm('Are you sure want to delete this data?')">
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
      </div>
    
@endsection
    
      <!-- Modal Upload Import Training -->
      {{-- <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Import bobot</h4>
              </div>
              <form action="{{route('bobot.import')}}" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                      @csrf
                      <p><strong>Templates can be downloaded <a href="{{route('bobot.template')}}">here</a></strong></p>
                      <div class="form-group">
                          <label for="file">File :</label>
                          <input type="file" name="file" class="form-control" required="required">
                      </div>  
                  </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Import</button>
              </div>
              </div> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- Modal Upload Import File -->
  {{-- <div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Import Arsip File</h4>
          </div>
          <form action="#" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                  @csrf
                  <p><strong>Templates can be downloaded <a href="#">here</a></strong></p>
                  <div class="form-group">
                      <label for="file">File :</label>
                      <input type="file" name="file" class="form-control" required="required">
                  </div>  
              </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>
          </div> 
          </form>
        </div>
      </div>
    </div>
</div> --}}
 