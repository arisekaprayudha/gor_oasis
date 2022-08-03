@extends('layout.template')
@section('title','Edit arsip')

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Arsip</h3>
    </div>

        <form  class="form-horizontal" role="form" action="{{ url('arsip/'.$arsip->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="box-body">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Index:</label>
            <div class="col-sm-8">
                <select class="form-control select2" value="{{ old('klasifikasi_id') }}"  id="klasifikasi_id" name="klasifikasi_id" placeholder="Select Index" style="width: 100%;">
                    <option value="">Select Index</option>
                    @foreach($klasifikasi as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $arsip->klasifikasi_id ? 'selected' : '' }}>{{ $item->klasifikasi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Unit Kerja:</label>
            <div class="col-sm-8">
                <select class="form-control select2" value="{{ old('unitkerja_id') }}"  id="unitkerja_id" name="klasifikasi_id" placeholder="Select Unit Kerja" style="width: 100%;">
                    <option value="">Select Unit Kerja</option>
                    @foreach($unitkerja as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $arsip->unitkerja_id ? 'selected' : '' }}>{{ $item->unitkerja }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Lokasi:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="lokasi" type="text" value="{{ $arsip->lokasi}}" >
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Uraian : </label>
            <div class="col-sm-8">
            <textarea class="form-control" name="uraian" rows="3"  value="{{$arsip->uraian}}" placeholder="Catatan...">{{$arsip->uraian}}</textarea>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Jumlah :</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" value="{{$arsip->jumlah}}" name="jumlah" placeholder="Jumlah">
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Media :</label>
            <div class="col-sm-8">
            <select class="form-control select2" name="media" placeholder="Media" style="width: 100%;">
                <option value="Kertas" {{ $arsip->media == "Kertas" ? 'selected' : '' }}>Kertas</option>
                <option value="CD" {{ $arsip->media == "CD" ? 'selected' : '' }}>CD</option>
            </select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Kondisi :</label>
            <div class="col-sm-8">
            <select class="form-control select2" name="kondisi" placeholder="Kondisi" style="width: 100%;">
                <option value="Baik" {{ $arsip->kondisi == "Baik" ? 'selected' : '' }}>Baik</option>
                <option value="Rusak" {{ $arsip->kondisi == "Rusak" ? 'selected' : '' }}>Rusak</option>
            </select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Tingkat Pengembangan :</label>
            <div class="col-sm-8">
            <select class="form-control select2" name="tingkatpengembangan" placeholder="Tingkat Pengembangan" style="width: 100%;">
                <option value="Asli" {{ $arsip->kondisi == "Asli" ? 'selected' : '' }}>Asli</option>
                <option value="Fotocopy" {{ $arsip->kondisi == "Fotocopy" ? 'selected' : '' }}>Fotocopy</option>
            </select>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Retensi :</label>
            <div class="col-sm-2">
                <input type="number" class="form-control" value="{{$arsip->retensi}}" name="retensi" placeholder="Retensi">
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Akhir Retensi:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="akhirRetensi" type="text" value="{{ $arsip->akhirRetensi}}" >
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Tahun:</label>
            <div class="col-sm-8">
                <input class="form-control select2"  name="tahun" type="text" value="{{ $arsip->tahun}}" >
            </div>
        </div>

    </div>

        <div class="modal-footer">
            <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>

</div>
@endsection