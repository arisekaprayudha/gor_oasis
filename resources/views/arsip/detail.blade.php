@extends('layout.template')
@section('title','Detail Arsip')

@section('content')

<div class="box">
    <div class="box-header with-border">

        <h3 class="box-title">Detail Arsip</h3>
    </div>

    <div class="box-body form-horizontal">

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

        @foreach ($arsip->detailarsip as $items)
        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">File :</label>
            {{-- @foreach ($items->report as $test) --}}
            <span class="right badge badge-danger"></span>
            <div class="col-sm-6">
                <input class="form-control select2" value="{{$items->file}}" style="width: 100%;"  disabled>
                {{-- <input class="form-control select2" type="hidden" name="namefile" value="{{$items->id}}" style="width: 100%;"  disabled> --}}
            </div>
            {{-- @endforeach --}}
    
            <div class="col-sm-1">
                {{-- <a href="{{route('arsip-download',$items->file)}}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-download"></i></a> --}}
                {{-- <a href="{{route('arsip-download',$items->file)}}" data-id="{{$items->id}}" type="button" class="btn btn-sm btn-danger downloader"><i class="fa fa-download"></i></a> --}}
                <a href="{{route('arsip-download',$items->file)}}" data-id="{{$items->id}}" id="downloader" class="btn btn-sm btn-danger downloader"><i class="fa fa-download"></i></a>
            
                {{-- <form action="/ajaxRequest/{{$items->id}}" method="post">
                    @csrf
                    @method('Post')
                    <button class="btn-submit" type="submit" onclick="{{route('arsip-download',$items->file)}}"></button>
                </form> --}}
            </div>
            <div class="col-sm-1">
                @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
                <a href="{{url('/peminjaman/'.$items->id)}}" class="btn btn-primary">Request</a>
                @endif
                {{-- <form action="/arsip/{{ $items->id }}/store" method="post">
                    @csrf
                    @method('Post')
                    @if(auth()->user()->role()->where('nameRole', '=', 'User')->exists())
                    <button type="submit" class="btn btn-primary">Request</button>
                    @endif
                </form> --}}
            </div>
        </div>
        @endforeach

        {{-- <a href="{{route('arsip-download',$arsip->detailarsip->file)}}" type="button" class="btn btn-primary btn-floating btn-sm"><i class="fa fa-download"></i></a> --}}
        {{-- <a href="{{route('arsip-download',$arsip->file)}}" class="btn btn-sm btn-danger">
            <i class="fa fa-download"></i>
        </a> --}}

        <br>
        
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