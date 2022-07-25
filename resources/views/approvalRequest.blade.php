@extends('layout.template')
@section('title','Approval Request')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Approval Request</h3>
    </div>

    <div class="box-body form-horizontal">

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Tanggal Request :</label>
            <div class="col-sm-8">
            <input class="form-control select2" value="{{$pengajuaan->created_at}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Nama Peminjam :</label>
            <div class="col-sm-8">
            <input class="form-control select2" value="{{$pengajuaan->user->name}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Unit Kerja Peminjam :</label>
            <div class="col-sm-8">
            <input class="form-control select2" value="{{$pengajuaan->user->unitkerja->unitkerja}}" style="width: 100%;" disabled>
            </div>
        </div>

        <form class="form-horizontal" method="post" role="form" action="/arsip/{{ $pengajuaan->id }}/store">
            @method('PUT')
            @csrf
            {{-- <input type="hidden"name="arsip_id"value="{{ $pengajuaan->arsip->id }}">
            <input type="hidden"name="user_id"value="{{ $pengajuaan->user->id }}"> --}}
            {{-- <input type="hidden"name="code"value="{{ $pengajuaan->code }}"> --}}
                <div class="form-group row mt-2">
                    <label class="col-sm-3 control-label">Decision :</label>
                    <div class="col-lg-4">
                        <div class="checkbox">
                            <label><input type="radio" name="status" id="approve" onclick="javascript:statusCheck();" value="1"> Approve</label>
                        </div>
                    </div>
    
                    <div class="col-lg-2">
                        <div class="checkbox">
                            <label><input type="radio" name="status" id="reject" onclick="javascript:statusCheck();" value="2"> Reject</label>
                        </div>
                    </div>
                </div>
    
                <div id="ifreject" style="display:none">
                    <div class="form-group row mt-2">
                    <label class="col-sm-3 control-label">Description :</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="description" rows="3" placeholder="Catatan..."></textarea>
                    </div>
                </div>
                </div>
    
                <div class="modal-footer">
                <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
 
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