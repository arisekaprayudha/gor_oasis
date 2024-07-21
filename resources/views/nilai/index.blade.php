@extends('layout.template')
@section('title','Data Nilai')

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
            <h3 class="box-title">Data Nilai</h3> 
            <a href="/nilai/create" class="btn btn-primary ">
              create
            </a>
            <a href="/exportNilai" type="button" class="btn btn-success">
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
                                  <th width="10" rowspan="2">
                                    No
                                  </th>
                                  <th rowspan="2">
                                    Nama
                                  </th>
                                  <th colspan="4">
                                    Kriteria Penilaian Sikap
                                  </th>
                                  <th colspan="4">
                                    Kriteria penilaian teknis
                                  </th>
                                  <th rowspan="2">
                                    Aksi
                                  </th>
                              </tr>
                              <tr>
                                <th>
                                  C1
                                </th>
                                <th>
                                  C2
                                </th>
                                <th>
                                 C3
                                </th>
                                <th>
                                  C4
                                </th>
                                <th>
                                  C1
                                </th>
                                <th>
                                  C2
                                </th>
                                <th>
                                 C3
                                </th>
                                <th>
                                  C4
                                </th>
                            </tr>
                          </thead>
                          <tbody>
                            
                                   <tr>
                                      <td>1.</td>
                                      <td>Muhammad Dimas</td>
                                      <td>4</td>
                                      <td>4</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>1</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>4</td>
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
                                      <td>Rafida Raudina</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>3</td>
                                      <td>4</td>
                                      <td>4</td>
                                      <td>4</td>
                                      <td>4</td>
                                      <td>2</td>
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
                                    <td>Teguh Purnomo</td>
                                    <td>2</td>
                                      <td>1</td>
                                      <td>2</td>
                                      <td>4</td>
                                      <td>2</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>4</td>
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
                                    <td>Anisa Cantika</td>
                                    <td>1</td>
                                      <td>3</td>
                                      <td>4</td>
                                      <td>4</td>
                                      <td>1</td>
                                      <td>1</td>
                                      <td>4</td>
                                      <td>1</td>
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
                                    <td>Adam Prakoso</td>
                                    <td>4</td>
                                      <td>2</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>3</td>
                                      <td>4</td>
                                      <td>2</td>
                                      <td>1</td>
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
                                    <td>Salsabila Yasmin</td>
                                    <td>4</td>
                                      <td>3</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>1</td>
                                      <td>3</td>
                                      <td>2</td>
                                      <td>3</td>
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

                                  <td>7.</td>
                                  <td>Bayu Widyanto</td>
                                  <td>3</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>2</td>
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

                                <td>8.</td>
                                <td>Nabila Putri</td>
                                <td>2</td>
                                  <td>1</td>
                                  <td>2</td>
                                  <td>2</td>
                                  <td>2</td>
                                  <td>3</td>
                                  <td>2</td>
                                  <td>2</td>
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

                              <td>9.</td>
                              <td>Abdul Fajar</td>
                              <td>1</td>
                                <td>3</td>
                                <td>3</td>
                                <td>3</td>
                                <td>1</td>
                                <td>1</td>
                                <td>2</td>
                                <td>1</td>
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

                            <td>10.</td>
                            <td>Aditya Pradika</td>
                            <td>2</td>
                              <td>2</td>
                              <td>3</td>
                              <td>2</td>
                              <td>3</td>
                              <td>1</td>
                              <td>2</td>
                              <td>1</td>
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
 