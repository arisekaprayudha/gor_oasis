@extends('layout.template')
@section('title','Detail Testing')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Detail Arsip</h3>
    </div>

    <div class="box-body form-horizontal">

       
        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Kode :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="code" value="{{$testing->code}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Nama Barang :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="namabarang" value="{{$testing->namabarang}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Kategori :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="kategori" value="{{$testing->kategori}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Satuan :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="satuan" value="{{$testing->satuan}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Harga :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="harga" value="{{$testing->harga}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Berat :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="berat" value="{{$testing->berat}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Ukuran :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="ukuran" value="{{$testing->ukuran}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Bentuk :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="bentuk" value="{{$testing->bentuk}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Penjualan :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="penjualan" value="{{$testing->penjualan}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">Jumlah Peminat :</label>
            <div class="col-sm-8">
            <input class="form-control select2" name="jumlahpeminat" value="{{$testing->jumlahpeminat}}" style="width: 100%;" disabled>
            </div>
        </div>

        <div class="pull-right">
            <div class="box-footer">
                {{-- <form action="/arsip/{{ $arsip->id }}/store" method="post">
                    @csrf
                    @method('Post')
                    @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
                    <button type="submit" class="btn btn-primary">Request</button>
                    @endif
                </form> --}}
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

    $(document).ready(function(){

        $("#downloader").click(function(){
            var idFile = $(this).attr('data-id');

            $.ajax({
                type:'GET',
                url:"{{url('ajaxRequest')}}",
                data:{id:idFile},
                success:function(data){
                    console.log();
                }
            });
        });
    });
    

</script>

@endsection