@extends('layout.template')
@section('title','Pengajuan Peminjaman')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Pengajuan Peminjaman</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form role="form" action="/arsip/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body form-horizontal">

            <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Kode Arsip :</label>
                <div class="col-sm-8">
                    <input type="text" value="{{$detailarsip->arsip->code}}"  class="form-control" id="lokasi" placeholder="Kode Arsip" disabled>
                </div>
            </div>

            <input type="hidden"name="file_id"value="{{$detailarsip->id}}">

            <div class="form-group row mt-2">
                <label class="col-sm-3 control-label">Nama File :</label>
                <div class="col-sm-8">
                    <input type="text" value="{{$detailarsip->file}}"  class="form-control" id="lokasi" placeholder="Nama File" disabled>
                    {{-- <input type="hidden" name="file_id" value="{{$detailarsip->id}}"  class="form-control" id="lokasi" placeholder="Nama File"> --}}
                </div>
            </div>

            <div class="form-group row mt-2{{$errors->has('tujuan') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Tujuan : </label>
                <div class="col-sm-8">
                <textarea class="form-control" name="tujuan" rows="3" placeholder="Tujuan Peminjaman Arsip...">{{ old('tujuan') }}</textarea>
                @if ($errors->has('tujuan'))
                <span class="help-block">
                <strong>{{ $errors->first('tujuan') }}</strong>
                @endif
                </div>
            </div>

            <div class="pull-right">
            <div class="box-footer">
            <a href="/room" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>

    </div>

</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">

    var j = 0;
    var namefile = $("#namefile").val();
    var file = $("#file").val();
    var data = {
        namefile: namefile,
        file: file
     }
    $('.addfile').on('click',function(){ 
          addfile();
          j++;

      });
      function addfile(){
          var file= ' <div class="form-group row mt-2" id="file"><label class="col-sm-3 control-label">Attachment : </label><div class="col-sm-3"><input type="file" class="form-control" name="file[]" placeholder="file"></div><div class="col-lg-1"><a href="#" class="remove btn btn-danger addfile" style="float:right"><i class="fa fa-trash"></i></a></div></div>';
          $('.file').append(file);
 
      };
      $('.remove').live('click',function(){ 
          $(this).parent().parent().remove();
      });

</script> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#klasifikasi_id').on('change', function () {
            var idUnitkerja = this.value;
            $("#index_id").html('');
            $.ajax({
                url: "{{url('api/fetch-index')}}",
                type: "POST",
                data: {
                    klasifikasi_id: idUnitkerja,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#index_id').html('<option value="">Select Index</option>');
                    $.each(result.indices, function (key, value) {
                        $("#index_id").append('<option value="' + value.id + '">' + value.index + '</option>');
                    });
                    //$('#lesson_id').html('<option value="">Select Lesson</option>'); 
                }
            });
            });
    });
</script>


@endsection