@extends('layout.template')
@section('title','Input Nilai')

@section('content')

<div class="box ">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container-fluid">
        <div class="row">
        
        <div class="col">
        
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Input Nilai</h3>
        </div>
        
        
        <form role="form" action="/bobot" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="user_id">Murid</label>
                <select class="form-control select2" id="user_id" name="user_id" placeholder="Role" style="width: 100%;">
                <option value="">Select Role</option>
                @foreach($student as $item)
                    <option value="{{ $item->id }}" {{old('category_id') == $item->id ? "selected" : ""}}>{{ $item->name }}</option>
                @endforeach
                </select>
            </div>
        <div class="form-group">
        <label for="nama_kriteria">Ketangkasan / cekatan</label>
        <input type="number" class="form-control" name="c1"  id="c1" placeholder="Ketangkasan / cekatan">
        </div>
        <div class="form-group">
        <label for="bobot">Tanggung jawab & disiplin</label>
        <input type="number" class="form-control" name="c2" id="c2" placeholder="Tanggung jawab & disiplin">
        </div>
        <div class="form-group">
            <label for="nama_kriteria">Kerjasama tim</label>
            <input type="number" class="form-control" name="c3"  id="c3" placeholder="Kerjasama tim">
            </div>
            <div class="form-group">
            <label for="bobot">Menghormati lawan</label>
            <input type="number" class="form-control" name="c4" id="c4" placeholder="Menghormati lawan">
            </div>

            <div class="form-group">
                <label for="nama_kriteria">Kemahiran memegang raket</label>
                <input type="number" class="form-control" name="c5"  id="c5" placeholder="Kemahiran memegang raket">
                </div>
                <div class="form-group">
                <label for="bobot">Kamahiran service rendah & tinggi</label>
                <input type="number" class="form-control" name="c6" id="c6" placeholder="Kamahiran service rendah & tinggi">
                </div>
                <div class="form-group">
                    <label for="nama_kriteria">Kemahiran Deep lob/Clear</label>
                    <input type="number" class="form-control" name="c7"  id="c7" placeholder="Kemahiran Deep lob/Clear">
                    </div>
                    <div class="form-group">
                    <label for="bobot">Kemahiran Attacking lob/clear</label>
                    <input type="number" class="form-control" name="c8" id="c8" placeholder="Kemahiran Attacking lob/clear">
                    </div>
        
        </div>
        
        <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ url()->previous() }}" type="button" class="btn btn-default" data-dismiss="modal">Back</a>
        </div>
        </form>
        </div>
        </div>
</div>


@endsection