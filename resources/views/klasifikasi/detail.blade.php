@extends('layout.template')
@section('title','Klasifikasi Detail')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Detail Klasifikasi</h3>
    </div>

    <div class="box-body">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Kode :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="code" value="{{$klasifikasi->code}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Sub Code :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="subcode" value="{{$klasifikasi->subcode}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Klasifikasi :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="klasifikasi" value="{{$klasifikasi->klasifikasi}}" style="width: 100%;" disabled>
            </div>
        </div>
        
        <div class="pull-right">
            <div class="box-footer">
                <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
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