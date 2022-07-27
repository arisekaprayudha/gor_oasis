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

        @foreach ($arsip->detailarsip as $items)
        <div class="form-group row mt-2">
            <label class="col-sm-3 control-label">File :</label>
            <div class="col-sm-6">
                <input class="form-control select2" name="namefile" value="{{$items->file}}" style="width: 100%;" disabled>
            </div>
            <div class="col-sm-1">
                {{-- <a href="{{route('arsip-download',$items->file)}}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-download"></i></a> --}}
                <a href="{{route('arsip-download',$items->file)}}" type="button" class="btn btn-sm btn-danger btn-submit"><i class="fa fa-download"></i></a>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit").click(function(e){
  
        e.preventDefault();
   
        var name = $("input[name=namefile]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('ajaxRequest.post') }}",
           data:{file_id:name},
           success:function(data){
              alert(data.success);
           }
        });


    function statusCheck() {
        if (document.getElementById('reject').checked) {
            document.getElementById('ifreject').style.display = 'block';
        }
        else document.getElementById('ifreject').style.display = 'none';
    
    }

</script>

@endsection