@extends('layout.template')
@section('title','Pengajuan Peminjaman')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Pengajuan Peminjaman</h3>
    </div>

    <div class="box-body">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Kode Arsip :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$detailarsip->arsip->code}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Nama File :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$detailarsip->file}}" style="width: 100%;" disabled>
            </div>
        </div>

        {{-- <form role="form" action="/arsip" method="post" enctype="multipart/form-data"> --}}
        @csrf
        <div class="form-group row mt-2{{$errors->has('tujuan') ? ' has-error' : ' '}}">
            <label class="col-sm-3 control-label">Tujuan Peminjaman : </label>
            <div class="col-sm-8">
            <textarea class="form-control" name="tujuan" rows="3" placeholder="Jelaskan Tujuan Peminjaman...">{{ old('uraian') }}</textarea>
            @if ($errors->has('tujuan'))
            <span class="help-block">
            <strong>{{ $errors->first('tujuan') }}</strong>
            @endif
            </div>
        </div>

        <br>
        
        <div class="pull-right">
            <div class="box-footer">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                <form action="/arsip/{{ $detailarsip->id }}/store" method="post">
                    @csrf
                    @method('Post')
                    @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
                    <button type="submit" class="btn btn-primary">Request</button>
                    @endif
                </form>
            </div>
        </div>
 
    </div>
    {{-- </form> --}}
    </div>
</div>

@endsection