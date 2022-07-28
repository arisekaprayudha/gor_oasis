@extends('layout.template')
@section('title','Request Detail')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Request Detail</h3>
    </div>

    <div class="box-body form-horizontal">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Tanggal Request :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$pengajuaan->created_at}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Nama Peminjam :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$pengajuaan->user->name}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Unit Kerja Peminjam :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$pengajuaan->user->unitkerja->unitkerja}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Status :</label>
            <div class="col-sm-8">
                @if ($pengajuaan->status==0)
                <input class="form-control select2" type="text" value="Pending" disabled>
                @elseif($pengajuaan->status==1)
                <input class="form-control select2" type="text" value="Approve" disabled>
                @else
                <input class="form-control select2" type="text" value="Reject" disabled>
                @endif
            </div>
        </div>

        {{-- <a href="{{route('arsip-download',$arsip->file)}}" type="button" class="btn btn-primary btn-floating btn-sm"><i class="fas fa-download"></i></a> --}}
        {{-- <a href="{{route('arsip-download',$arsip->file)}}" class="btn btn-sm btn-danger">
            <i class="fa fa-download"></i>
        </a> --}}

        <br>
        
        <div class="pull-right">
            <div class="box-footer">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
            </div>
        </div>
 
    </div>
    </div>
</div>

@endsection