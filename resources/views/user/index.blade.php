@extends('layout.template')
@section('title','Data User')

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
            <h3 class="box-title">Data User</h3> 
            <a href="/user/create" class="btn btn-primary ">
              create
            </a>
            <a href="/exportUser" type="button" class="btn btn-success">
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
                                    Nama
                                  </th>
                                  <th>
                                   Status
                                  </th>
                                  <th>
                                    Aksi
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($user as $item)
                            <td>
                              {{ $loop->iteration }}
                            </td>
                            <td>
                              {{ $item->name }}
                            </td>
                            
                            @foreach ($item->role as $role)
                            @if ($role->id == "1") 
                              <td><span class="badge bg-danger">Admin</span></td>
                            @elseif ($role->id == "2") 
                              <td><span class="badge bg-success">Orang tua / Wali</span></td>
                            @elseif ($role->id == "3") 
                              <td><span class="badge bg-warning">Atlet</span></td>
                            @elseif ($role->id == "4") 
                              <td><span class="badge bg-primary">Pelatih</span></td>
                              {{-- {{ $role->id }} --}}
                            @endif
                            @endforeach
                            
                            <td >
                              <div class="text-center" width="200px">
                              <a href="{{url('/user/'.$item->id)}}" class="btn btn-sm btn-success" >
                                <i class="fa fa-eye"></i> 
                            </a>
                            <a href="{{url('/user/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">
                                <i class="fa fa-edit"></i>
                            </a>
                            {{-- <a href="{{url('/bobot/'.$item->id)}}" class="btn btn-sm btn-danger">
                              <i class="fa fa-trash"></i>
                          </a> --}}
                            <form action="{{ url('user/'.$item->id) }}" class="inline" method="post" onclick="return confirm('Are you sure want to delete this data?')">
                                @method('delete')
                                @csrf       
                                <button type="submit" class="btn btn-sm btn-danger" >
                                    <i class="fa fa-trash"></i>
                                </button> 
                            </form>
                            </td>

                        </tr>
                                  {{-- <tr>
                                      <td>1.</td>
                                      <td>Admin</td>
                                      <td><span class="badge bg-danger">Admin</span></td>
                                      <td >
                                        <div class="text-center" width="200px">
                                        <a href="#" class="btn btn-sm btn-success" >
                                          <i class="fa fa-eye"></i> 
                                      </a>
                                      <a href="#" class="btn btn-sm btn-primary">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                      <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                      </td>

                                    </tr>

                                    <tr>

                                      <td>2.</td>
                                      <td>Aris Eka Prayudha </td>
                                      <td><span class="badge bg-primary">Pelatih</span></td>
                                      <td >
                                        <div class="text-center" width="200px">
                                        <a href="#" class="btn btn-sm btn-success" >
                                          <i class="fa fa-eye"></i> 
                                      </a>
                                      <a href="#" class="btn btn-sm btn-primary">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                      <a href="#" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                      </td>
    
                                  </tr>

                                  <tr>

                                    <td>3.</td>
                                    <td>Dewi Puspita Sari</td>
                                    <td><span class="badge bg-primary">Pelatih</span></td>
                                    <td >
                                      <div class="text-center" width="200px">
                                      <a href="#" class="btn btn-sm btn-success" >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                                    </td>
  
                                </tr>

                                <tr>

                                    <td>4.</td>
                                    <td>Budi Hartono</td>
                                    <td><span class="badge bg-success">Orang tua / Wali</span></td>
                                    <td >
                                      <div class="text-center" width="200px">
                                      <a href="#" class="btn btn-sm btn-success" >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                                    </td>
  
                                </tr>

                                <tr>

                                    <td>5.</td>
                                    <td>Muhammad Dimas</td>
                                    <td><span class="badge bg-warning">Atlet</span></td>
                                    <td >
                                      <div class="text-center" width="200px">
                                      <a href="#" class="btn btn-sm btn-success" >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                                    </td>
  
                                </tr>

                                <tr>

                                    <td>6.</td>
                                    <td>Putri Dian</td>
                                    <td><span class="badge bg-success">Orang tua / Wali</span></td>
                                    <td >
                                      <div class="text-center" width="200px">
                                      <a href="#" class="btn btn-sm btn-success" >
                                        <i class="fa fa-eye"></i> 
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
                                      <i class="fa fa-trash"></i>
                                  </a>
                                    </td>
  
                                </tr> --}}
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
 