@extends('layout.template')
@section('title','Arsip Detail')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Arsip Detail</h3>
    </div>

    <div class="box-body">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Nomer Pelaksana :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$arsip->code}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Unit Kerja :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$arsip->unitkerja->unitkerja}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Index :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$arsip->index_id}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Tanggal :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="nomerPelaksana" value="{{$arsip->tanggal}}" style="width: 100%;" disabled>
            </div>
        </div>

        {{-- <a href="{{route('arsip-download',$arsip->file)}}" type="button" class="btn btn-primary btn-floating btn-sm"><i class="fas fa-download"></i></a> --}}
        <a href="{{route('arsip-download',$arsip->file)}}" class="btn btn-sm btn-danger">
            <i class="fa fa-download"></i>
        </a>

        <br>
        
        <div class="pull-right">
            <div class="box-footer">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
                @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
                <button type="submit" class="btn btn-primary">Request</button>
                @endif
            </div>
        </div>
 
    </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">

    function statusCheck() {
        if (document.getElementById('reject').checked) {
            document.getElementById('ifreject').style.display = 'block';
        }
        else document.getElementById('ifreject').style.display = 'none';
    
    }

</script>

@endsection