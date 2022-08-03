@extends('layout.template')
@section('title','Data Request')

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
        <h3 class="box-title">Data Request</h3>
        <div class="pull-right">
        </div>
    </div>

    @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
    @foreach ($request as $item)
    @if(Auth::user()->id == $item->user->id )
    @if($item->tanggalpengembalian > $tanggalhariini && $item->status == 1)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i>Pengembalian Dokumen {{ $item->detail_arsip->file}} !</h4>
            Harap mengembalikan dokumen yang telah dipinjam, abaikan pesan ini jika anda telah mengembalikannya
        </div>

        <!-- modal alert pengembalian -->
        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div> 
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    @endif

    <div class="box-body table-responsive">
        <table id="table"  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Request</th>
                <th>User</th>
                <th>Unit Kerja</th>
                <th>Kode Arsip</th>
                <th>Nama Arsip</th>
                <th>Tanggal Request</th>
                <th>Satus</th>
                <th class="text-center">Aksi</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($request as $item)
            @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
            @if(Auth::user()->id == $item->user->id )
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->tanggalpengembalian }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->unitkerja->unitkerja }}</td>
                <td>{{ $item->detail_arsip->arsip->code}}</td>
                <td>{{ $item->detail_arsip->file}}</td>
                {{-- <td>{{ $item->arsip->code }}</td> --}}
                <td>{{ $item->created_at }}</td>
                <td>
                    @if($item->status == 1)
                      <label class="label label-success">Approve</label>
                    
                    @elseif($item->status == 0)
                    <label class="label label-warning">Pending</label>
                    @elseif($item->status == 2)
                    <label class="label label-danger">Reject</label>
                    @endif
                  </td>
                <td class="text-center" width="200px">
                    <a href="{{url('/detailrequest/'.$item->id)}}" class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i> 
                    </a>
                    @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
                    @if($item->status == 0)
                    <a href="{{url('/requestsubmission/'.$item->id)}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-check-square-o"></i>
                    </a>
                    @else
                        <a type="button" class="btn btn-sm btn-primary status" disabled><i class="fa fa-check-square-o"></i> </a>
                    @endif
                    @endif
                </td>
            </tr>
            @endif
            @else
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->tanggalpengembalian }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->user->unitkerja->unitkerja }}</td>
                <td>{{ $item->detail_arsip->arsip->code}}</td>
                <td>{{ $item->detail_arsip->file}}</td>
                {{-- <td>{{ $item->arsip->code }}</td> --}}
                <td>{{ $item->created_at }}</td>
                <td>
                    @if($item->status == 1)
                      <label class="label label-success">Approve</label>
                    
                    @elseif($item->status == 0)
                    <label class="label label-warning">Pending</label>
                    @elseif($item->status == 2)
                    <label class="label label-danger">Reject</label>
                    @endif
                  </td>
                <td class="text-center" width="200px">
                    <a href="{{url('/detailrequest/'.$item->id)}}" class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i> 
                    </a>
                    @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
                    @if($item->status == 0)
                    <a href="{{url('/requestsubmission/'.$item->id)}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-check-square-o"></i>
                    </a>
                    @else
                        <a type="button" class="btn btn-sm btn-primary status" disabled><i class="fa fa-check-square-o"></i> </a>
                    @endif
                    @endif
                </td>
            </tr>
            @endif
            @endforeach
           
        </tbody> 
    </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#category_id').on('change', function () {
            var idCategory = this.value;
            $("#subcategory_id").html('');
            $.ajax({
                url: "{{url('api/fetch-subcategory')}}",
                type: "POST",
                data: {
                    category_id: idCategory,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#subcategory_id').html('<option value="">Select Subcategory</option>');
                    $.each(result.subcategory_trainings, function (key, value) {
                        $("#subcategory_id").append('<option value="' + value.id + '">' + value.nameSubcategory + '</option>');
                    });
                }
            });
        });
    });
</script>



@endsection


<!-- Modal -->
<div class="modal fade" id="provider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Lesson</h4>
        </div>
        <div class="modal-body">
            <form action="/lesson" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{$errors->has('nameLesson') ? ' has-error' : ' '}}">
                <label for="nameLesson">Name Lesson :</label>
                <input type="text" name="nameLesson" class="form-control" value="{{ old('nameLesson') }}" placeholder="Nama Lesson Training">
                @if ($errors->has('nameLesson'))
                <span class="help-block"><strong>{{ $errors->first('nameLesson') }}</strong></span>
                @endif
            </div>   

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{$errors->has('category_id') ? ' has-error' : ' '}}">
                    <label>Category Training : </label>
                    <select class="form-control select2" id="category_id" name="category_id" placeholder="categoryTraining" style="width: 100%;">
                        <option value="">Name Category</option>
                    
                    </select>
                    @if ($errors->has('category_id'))
                    <span class="help-block"><strong>{{ $errors->first('category_id') }}</strong></span>
                    @endif
                    {{-- <div class="col-lg-2">
                        <select class="form-control select2" id="subcategory" name="subcategory" placeholder="subcategoryTraining" style="width: 100%;">
                        </select>
                    </div> --}}
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group {{$errors->has('subcategory_id') ? ' has-error' : ' '}}">
                        <label>Subcategory Training :</label>
                        <select class="form-control select2" id="subcategory_id" name="subcategory_id" placeholder="subcategoryTraining" style="width: 100%;">
                        </select>
                        @if ($errors->has('subcategory_id'))
                            <span class="help-block"><strong>{{ $errors->first('subcategory_id') }}</strong></span>
                        @endif
                    </div>
                </div>
            </div>
    

            <div class="form-group {{$errors->has('file') ? ' has-error' : ' '}}">
                <label class="control-label">Video :</label>
                <div class="controls">
                    <div id="uniform-undefined">
                        <input type="file" name="file" class="form-control">
                        @if ($errors->has('file'))
                            <span class="help-block"><strong>{{ $errors->first('file') }}</strong></span>
                        @endif
                        {{-- <span class="filename">No file selected</span> --}}
                        {{-- <span class="action">Choose File</span> --}}
                    </div>
                </div>
            </div>

            <div class="form-group {{$errors->has('description') ? ' has-error' : ' '}}">
                <label>Description :</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Description ..."></textarea>
                @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
                @endif
            </div>

            {{-- <div class="form-group">
                <label for="description">Description :</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Description">
                @if ($errors->has('description'))
                <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>    --}}

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
          <h4 class="modal-title" id="myModalLabel">Import Arsip</h4>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <p><strong>Templates can be downloaded <a href="{{route('arsip.template')}}">here</a></strong></p>
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