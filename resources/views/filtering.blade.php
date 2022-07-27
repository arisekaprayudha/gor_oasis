@extends('layout.template')
@section('title','Searching')

@section('content')

<div class="box ">
    <div class="box-header with-border">
        <h3 class="box-title">Pencarian</h3>
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

<form role="form" action="#" method="post" enctype="multipart/form-data">
    @csrf
    <div class="box-body">

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

        <div class="form-group row mt-2 {{$errors->has('jenis') ? ' has-error' : ' '}}">
            <label class="col-sm-3 control-label">Jenis :</label>
            <div class="col-sm-8">
                <select class="form-control select2" id="jenis" name="jenis" placeholder="Jenis" style="width: 100%;">
                    <option value="">Jenis</option>
                    <option value="Dokumen" {{old('dokumen') == "dokumen" ? "selected" : ""}}>Dokumen</option>
                    <option value="Surat Masuk" {{old('suratmasuk') == "suratmasuk" ? "selected" : ""}}>Surat Masuk</option>
                    <option value="Surat Keluar" {{old('suratkeluar') == "suratkeluar" ? "selected" : ""}}>Surat Keluar</option>
                    <option value="Nota Dinas" {{old('notadinas') == "notadinas" ? "selected" : ""}}>Surat Masuk</option>
                </select>
                @if ($errors->has('jenis'))
            <span class="help-block">
            <strong>{{ $errors->first('jenis') }}</strong>
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

      
        <div class="pull-right">
        <div class="box-footer">
        <a href="/lesson" type="button" class="btn btn-default" data-dismiss="modal">Search</a>
        </div>
        </div>

</div>

</form>

</div>

@endsection