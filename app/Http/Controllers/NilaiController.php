<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\facades\Excel;
use App\Imports\NilaiImport;
use App\Exports\NilaiExport;
use App\Exports\NilaiTemplate;
use App\Models\Nilai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use DB;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nilai = Nilai::all();
        //$unitkerja = UnitKerja::all();
        //dd($unitkerja);
        return view('nilai.index');
        //return view('nilai.index',compact('nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = DB::table('users') ->join('role_user', 'users.id', '=', 'role_user.user_id')->select('users.id', 'users.name')->where('role_id', '3')->get();
        return view('nilai.add',compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code_nilai = [
            'table' => 'nilais',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'BTB-'
        ];

        $request->validate([

            'namabarang' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'penjualan' => 'required',
            'berat' => 'required',
            'ukuran' => 'required',
            'kategori' => 'required',
            'bentuk' => 'required',
            'jumlahpeminat' => 'required',


        ], [
           
            'namabarang.required' => 'Kolom Nama Barang wajib diisi',
            'satuan.required' => 'Kolom Satuan wajib diisi',
            'harga.required' => 'Kolom Harga wajib diisi',
            'penjualan.required' => 'Kolom penjualan wajib diisi',
            'kategori.required' => 'Kolom Kategori wajib diisi',
            'berat.required' => 'Kolom kategori wajib diisi',
            'ukuran.required' => 'Kolom ukuran wajib diisi',
            'bentuk.required' => 'Kolom Bentuk wajib diisi',
            'jumlahpeminat.required' => 'Kolom Jumlah Peminat wajib diisi',

        ]);


        $code = IdGenerator::generate($code_nilai);
        $request->request->add(['code' => $code]);

        $nilai = Nilai::create($request->all());

        return redirect('/nilai')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai = Nilai::find($id);
        return view('nilai.detail',compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Nilai::findorfail($id);
        return view('nilai.edit',compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nilai = Nilai::findorfail($id);
        $nilai->update($request->all());
        return redirect('/nilai')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect('/nilai')->with('succes','success delete data');
    }

    public function nilaiExport()
    {
        return Excel::download(new NilaiExport,'nilai.xlsx');
    }

    public function nilaiImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataNilai', $nameFile);

        Excel::import(new NilaiImport, public_path('/datanilai/'.$nameFile));
        return redirect('/nilai');
    }

    public function templateNilai()
    {
        return Excel::download(new NilaiTemplate,'TemplateNilai.xlsx');
    }
}
