@extends('layout.template')
@section('title','Add Arsip')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Add Arsip</h3>
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

    <form role="form" action="/arsip" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">

            {{-- <div class="form-group row mt-2 {{$errors->has('nomerPelaksana') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Kode Pelaksaan :</label>
                <div class="col-sm-8">
                    <input type="text" name="nomerPelaksana" value="{{ old('nomerPelaksana') }}"  class="form-control" id="nameRoom" placeholder="Kode Pelaksanaan">
                @if ($errors->has('nomerPelaksana'))
                <span class="help-block">
                <strong>{{ $errors->first('nomerPelaksana') }}</strong>
                @endif
                </div>
            </div>  --}}

            <div class="form-group row mt-2 {{$errors->has('unitkerja') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Unit Kerja :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" value="{{ old('unitkerja_id') }}"  id="category_id" name="unitkerja_id" placeholder="Select Unit Kerja" style="width: 100%;">
                        <option value="">Select Unit Kerja</option>
                        @foreach($unitkerja as $item)
                        <option value="{{ $item->id }}" {{old('unitkerja_id') == $item->id ? "selected" : ""}}>{{ $item->unitkerja }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mt-2 {{$errors->has('jenis') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Jenis :</label>
                <div class="col-sm-8">
                    <div class="radio">
                        <label>
                        <input type="radio" name="jenis" value="Dokumen" id="jenis">
                        Dokumen
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="jenis" value="Surat Masuk" id="jenis">
                        Surat Masuk
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="jenis" value="Surat Keluar" id="jenis">
                        Surat Keluar
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="jenis" value="Nota Dinas" id="jenis">
                        Nota Dinas
                        </label>
                    </div>
                    @if ($errors->has('jenis'))
                <span class="help-block">
                <strong>{{ $errors->first('jenis') }}</strong>
                @endif
                </div>
            </div>

            <div class="form-group row mt-2 {{$errors->has('index') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Index :</label>
                <div class="col-sm-8">
                    {{-- @foreach($index as $item) --}}
                    {{-- <label><input type="checkbox" name="index_id[]" value="{{ $item->index }}" class="minimal">{{ $item->index }}</label> --}}
                    {{-- <input type="text" name="index" value="{{ old('index') }}"  class="form-control" id="nameRoom" placeholder="Index"> --}}
                    {{-- @endforeach --}}
                        <div class = "radio">
                        @if(auth()->user()->role()->where('nameRole', '=', 'Admin')->exists())
                        @foreach($index as $item)
                            <label class="radio-inline">
                                <input type="radio" name="index" value="{{ $item->id }}"> {{ $item->index }}
                                <input type="hidden"name="klasifikasi"value="{{ $item->subcode }}">
                            </label><br>
                        @endforeach
                        @endif
                        @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
                        @foreach($data_index as $item)
                            <label class="radio-inline">
                                <input type="radio" name="index" value="{{ $item->id }}"> {{ $item->index }}
                                <input type="hidden"name="klasifikasi"value="{{ $item->subcode }}">
                            </label><br>
                        @endforeach
                        @endif
                        </div>
                    @if ($errors->has('index'))
                <span class="help-block">
                <strong>{{ $errors->first('Index') }}</strong>
                @endif
                </div>
            </div>

            <div class="form-group row mt-2 {{$errors->has('kondisi') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Kondisi :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" id="kondisi" name="kondisi" placeholder="Kondisi" style="width: 100%;">
                        <option value="">Kondisi</option>
                        <option value="Baik" {{old('baik') == "baik" ? "selected" : ""}}>Baik</option>
                        <option value="Rusak" {{old('rusak') == "rusak" ? "selected" : ""}}>Rusak</option>
                    </select>
                    @if ($errors->has('kondisi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kondisi') }}</strong>
                    </span>
                    @endif
                </div>
            </div> 

            <div class="form-group row mt-2 {{$errors->has('media') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Media :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" id="media" name="media" placeholder="Media" style="width: 100%;">
                        <option value="">Media</option>
                        <option value="Kertas" {{old('kertas') == "kertas" ? "selected" : ""}}>Kertas</option>
                        <option value="A3" {{old('a3') == "a3" ? "selected" : ""}}>A3</option>
                        <option value="CD" {{old('cd') == "cd" ? "selected" : ""}}>CD</option>
                    </select>
                    @if ($errors->has('media'))
                    <span class="help-block">
                        <strong>{{ $errors->first('media') }}</strong>
                    </span>
                    @endif
                </div>
            </div> 

            <div class="form-group row mt-2 {{$errors->has('tingkatpengembangan') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Tingkat Pengembangan :</label>
                <div class="col-sm-8">
                    <select class="form-control select2" id="tingkatpengembangan" name="tingkatpengembangan" placeholder="Tingkat Pengembangan" style="width: 100%;">
                        <option value="">Tingkat Pengembangan</option>
                        <option value="ASLI" {{old('asli') == "asli" ? "selected" : ""}}>ASLI</option>
                        <option value="Copy" {{old('copy') == "copy" ? "selected" : ""}}>Copy</option>
                    </select>
                    @if ($errors->has('tingkatpengembangan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tingkatpengembangan') }}</strong>
                    </span>
                    @endif
                </div>
            </div> 

            {{-- <div class="form-group row mt-2 {{$errors->has('index') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Lokasi :</label>
                <div class="col-sm-8">
                    <input type="text" name="ruangan" value="{{ old('ruangan') }}"  class="form-control" id="ruangan" placeholder="Ruangan">
                    <input type="text" name="lemari" value="{{ old('lemari') }}"  class="form-control" id="lemari" placeholder="Lemari">
                    <input type="text" name="noOrder" value="{{ old('noOrder') }}"  class="form-control" id="noOrder" placeholder="No Order">
                @if ($errors->has('index'))
                <span class="help-block">
                <strong>{{ $errors->first('Index') }}</strong>
                @endif
                </div>
            </div> --}}

            <div class="form-group row mt-2 {{$errors->has('lokasi') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Lokasi :</label>
                <div class="col-sm-8">
                    <input type="text" name="ruangan" value="{{ old('lokasi') }}"  class="form-control" id="lokasi" placeholder="Lokasi">
                @if ($errors->has('lokasi'))
                <span class="help-block">
                <strong>{{ $errors->first('lokasi') }}</strong>
                @endif
                </div>
            </div>


            <div class="form-group row mt-2 {{$errors->has('tanggal') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Tanggal :</label>
                <div class="col-sm-8">
                    <input type="date" name="tanggal" value="{{ old('tanggal') }}"  class="form-control" id="unitkerja" placeholder="Unit Kerja">
                @if ($errors->has('tanggal'))
                <span class="help-block">
                <strong>{{ $errors->first('tanggal') }}</strong>
                @endif
                </div>
            </div>
            
            {{-- <div class="form-group row mt-2{{$errors->has('file') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">File : </label>
                <div class="col-sm-8">
                    <div class="controls">
                        <div id="uniform-undefined">
                            <input type="file" name="file" class="form-control">
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="form-group row mt-2{{$errors->has('uraian') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Uraian : </label>
                <div class="col-sm-8">
                <textarea class="form-control" name="uraian" rows="3" placeholder="Uraian...">{{ old('uraian') }}</textarea>
                </div>
            </div>

           <div class="form-group row mt-2{{$errors->has('jumlah') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Jumlah : </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                </div> 
            </div>

            <div class="form-group row mt-2{{$errors->has('retensi') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Retensi : </label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="retensi" placeholder="Retensi">
                </div> 
            </div>

            <div class="form-group row mt-2 {{$errors->has('akhirRetensi') ? ' has-error' : ' '}}">
                <label class="col-sm-3 control-label">Akhir Retensi :</label>
                <div class="col-sm-8">
                    <input type="text" name="akhirRetensi" value="{{ old('akhirRetensi') }}"  class="form-control" id="akhirRetensi" placeholder="Akhir Retensi">
                @if ($errors->has('akhirRetensi'))
                <span class="help-block">
                <strong>{{ $errors->first('akhirRetensi') }}</strong>
                @endif
                </div>
            </div>

            {{-- <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Name File</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" value="{{ old('namefile[0]') }}" name="nameFile[0]" placeholder="Name File" class="form-control" style="width: 70%;"/>
                    </td>
                    <td><input type="file" value="{{ old('file[0]') }}" name="file[0]" placeholder="File" class="form-control" style="width: 70%;" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-primary"><i class="fa fa-plus"></i></button></td>
                </tr>
            </table><br/> --}}         
            
            <div class="form-group row mt-2" id="file">
                <label class="col-sm-3 control-label">Attachment : </label>
                <div class="col-sm-4">
                    <input type="text" id="namefile" class="form-control" name="namefile[]" placeholder="Name File">
                </div>

                <div class="col-sm-3">
                    <input type="file" class="form-control" name="file[]" placeholder="file">
                </div>
    
                <div class="col-lg-1">
                    <a href="#" class="btn btn-primary addfile" id="addfile" style="float:right"><i class="fa fa-plus"></i></a>
                </div>
            </div>

            <div class="file"></div>   

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
          var file= ' <div class="form-group row mt-2" id="file"><label class="col-sm-3 control-label">Attachment : </label><div class="col-sm-4"><input type="text" id="namefile" class="form-control" name="namefile[]" placeholder="Name File"></div><div class="col-sm-3"><input type="file" class="form-control" name="file[]" placeholder="file"></div><div class="col-lg-1"><a href="#" class="remove btn btn-danger addfile" style="float:right"><i class="fa fa-trash"></i></a></div></div>';
          $('.file').append(file);
 
      };
      $('.remove').live('click',function(){ 
          $(this).parent().parent().remove();
      });

</script> 


@endsection