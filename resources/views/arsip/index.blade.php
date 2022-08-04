@extends('layout.template')
@section('title','Data Arsip')

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
        {{-- <h3 class="box-title">Data Arsip</h3> --}}
        <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#searchmodal">
            Filtering
        </a>
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#provider">
                create
            </button> --}}
            @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
            <a href="/arsip/create" class="btn btn-primary btn-flat">
                create
            </a>
            <a href="/exportArsip" type="button" class="btn btn-success btn-flat">
                Export
            </a>
            <button type="button" class="btn btn-danger btn-flat" data-toggle="modal" data-target="#upload">
                Import
            </button>
            <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#uploadfile">
                Import File
            </button>
            @endif
            {{-- <a href="/categorytraining/create" class="btn btn-primary btn-flat">
                create
            </a> --}}
        </div>
    </div>

    <div class="box-body table-responsive">
        {{-- <p>Filter Arsip</p>
        <div class="row">
            <div class="col-md-2">
                        <select data-column="3" class="form-control select2 filter-select" id="filter-unitkerja">
                            <option value="">Unit Kerja</option>
                            @foreach($unitkerja as $item)
                            <option value="{{ $item->id }}" {{old('unitkerja_id') == $item->id ? "selected" : ""}}>{{ $item->unitkerja }}</option>
                            @endforeach
                        </select>
            </div>
            <div class="col-md-2">
                    <select data-column="2" class="form-control select2 filter-select" id="filter-klasifikasi">
                        <option value="">Klasifikasi</option>
                        @foreach($index as $item)
                        <option value="{{ $item->id }}" {{old('klasifikasi_id') == $item->id ? "selected" : ""}}>{{ $item->subcode }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col-md-2">
                    <select data-column="2" class="form-control select2 filter-select" id="filter-kondisi">
                        <option value="">Tahun</option>
                        @foreach($tahun as $item)
                        <option value="{{ $item->tahun }}" {{old('tahun') == $item->tahun ? "selected" : ""}}>{{ $item->tahun }}</option>
                        @endforeach
                    </select>
            </div>
        </div> --}}
        <div class="divider"></div>

        <table id="table"  class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Kode Pelaksanaan</th>
                <th>Nomer Surat</th>
                {{-- <th>Index</th> --}}
                <th>Klasifikasi</th>
                @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
                <th>Unit Kerja</th>
                @endif
                <th>Uraian</th>
                <th>Tahun</th>
                {{-- <th>Jumlah</th> --}}
                <th class="text-center">Aksi</th>
            </tr> 
        </thead>
        <tbody>
            @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
            @foreach ($arsip as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->nosurat }}</td>
                {{-- <td>{{ $item->index->index}}</td> --}}
                <td>{{ $item->index->subcode}}</td>
                <td>{{ $item->unitKerja->unitkerja }}</td>
                <td>{{ $item->uraian }}</td>
                <td>{{ $item->tahun }}</td>
                {{-- <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jumlah }}</td> --}}
                <td class="text-center" width="200px">
                    <a href="{{url('/arsip/'.$item->id)}} " class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i> 
                    </a>
                    <a href="{{url('/arsip/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a href="arsip/file/{{$item->id}}/create" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <form action="{{ url('arsip/'.$item->id) }}" class="inline" method="post" onclick="return confirm('Are you sure want to delete this data?')">
                        @method('delete')
                        @csrf         
                        <button type="submit" class="btn btn-sm btn-danger" >
                            <i class="fa fa-trash"></i>
                        </button> 
                    </form>
                </td>
            </tr>
            @endforeach
            @endif

            @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
            @foreach ($data_unitkerja as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->nosurat }}</td>
                <td>{{ $item->index->subcode}}</td>
                {{-- <td>{{ $item->klasifikasi }}</td> --}}
                <td>{{ $item->uraian }}</td>
                <td>{{ $item->tahun }}</td>
                {{-- <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jumlah }}</td> --}}
                <td class="text-center" width="200px">
                    <a href="{{url('/arsip/'.$item->id)}} " class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i> 
                    </a>
                    @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
                    <a href="{{url('/arsip/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('arsip/'.$item->id) }}" class="inline" method="post" onclick="return confirm('Are you sure want to delete this data?')">
                        @method('delete')
                        @csrf         
                        <button type="submit" class="btn btn-sm btn-danger" >
                            <i class="fa fa-trash"></i>
                        </button> 
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody> 
    </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">

    // Let klasifikasi = $("#filter-klasifikasi").val()
    // ,jenis = $("#filter-jenis").val()
    // ,unitkerja = $("#filter-unitkerja").val()

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

    // $(".filter").on('change',fuction(){
    //     // console.log("filter")
    //     klasifikasi = $("filter-klasifikasi").val()
    //     unitkerja = $("filter-unitkerja").val()
    //     jenis = $("jenis").val()
    //     // console.log([klasifikasi, unitkerja, jenis])
    // })
</script>



@endsection

<!-- Modal Upload Import Arsip -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Import Arsip</h4>
        </div>
        <form action="{{route('arsip.import')}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <p><strong>Templates can be downloaded <a href="{{route('arsipfile.template')}}">here</a></strong></p>
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

  <!-- Modal Upload Import File -->
<div class="modal fade" id="uploadfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Import Arsip File</h4>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <p><strong>Templates can be downloaded <a href="{{route('arsipfile.template')}}">here</a></strong></p>
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

  <!-- Modal Search -->
<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Pencarian Arsip</h4>
        </div>
        <div class="modal-body">
            <form action="/search" method="get">
            @csrf
            @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
            <div class="form-group row mt-2 {{$errors->has('unitkerja_id') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Unit Kerja :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" value="{{ old('unitkerja_id') }}"  id="unitkerja_id" name="unitkerja_id" placeholder="Select Unit Kerja" style="width: 100%;">
                        <option value="">Select Unit Kerja</option>
                        @foreach($unitkerja as $item)
                        <option value="{{ $item->id }}" {{old('unitkerja_id') == $item->id ? "selected" : ""}}>{{ $item->unitkerja }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('unitkerja_id'))
                <span class="help-block">
                <strong>{{ $errors->first('unitkerja_id') }}</strong>
                @endif
            </div> 
            @endif
            <div class="form-group row mt-2 {{$errors->has('klasifikasi_id') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Klasifikasi :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" value="{{ old('klasifikasi_id') }}"  id="klasifikasi_id" name="klasifikasi_id" placeholder="Select Klasifikasi" style="width: 100%;">
                        <option value="">Select Klasifikasi</option>
                        @foreach($index as $item)
                        <option value="{{ $item->id }}" {{old('klasifikasi_id') == $item->id ? "selected" : ""}}>{{ $item->subcode }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('klasifikasi_id'))
                <span class="help-block">
                <strong>{{ $errors->first('klasifikasi_id') }}</strong>
                @endif
            </div> 

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
        </div>
      </div>
    </div>
  </div>