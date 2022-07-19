@extends('layout.template')
@section('title','Data Index')

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
        <h3 class="box-title">Data Index</h3>
        <div class="pull-right">
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#provider">
                create
            </button> --}}
            <a href="/index/create" class="btn btn-primary btn-flat">
                create
            </a>
            <a href="/exportIndex" type="button" class="btn btn-success btn-flat">
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
                <th>Kode</th>
                <th>Sub Code / No Klasifikasi</th>
                <th>Name Index</th>
                <th>Unit Kerja</th>
                <th class="text-center">Aksi</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($index as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->code }}</td>
                <td>{{ $item->subcode}}</td>
                <td>{{ $item->index }}</td>
                <td>{{ $item->unitkerja->unitkerja }}</td>
                <td class="text-center" width="200px">
                    <a href="{{url('/index/'.$item->id)}} " class="btn btn-sm btn-success" >
                        <i class="fa fa-eye"></i> 
                    </a>
                    <a href="{{url('/index/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form action="{{ url('index/'.$item->id) }}" class="inline" method="post" onclick="return confirm('Are you sure want to delete this data?')">
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



  <!-- Modal Upload Import -->
<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Import Index</h4>
        </div>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <p><strong>Templates can be downloaded <a href="{{route('index.template')}}">here</a></strong></p>
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