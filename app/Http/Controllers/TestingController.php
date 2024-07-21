<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\facades\Excel;
use App\Imports\TestingImport;
use App\Exports\TestingExport;
use App\Exports\TestingTemplate;
use App\Models\Testing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Response;

use Auth;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testing = Testing::all();
        return view('testing.index',compact('testing'));
        //return view('arsip.index',compact('index','arsip','unitkerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $index = Index::all();
        // $unitkerja = UnitKerja::all();
        // $klasifikasi = Klasifikasi::all();
        // $data_index = Index::where('klasifikasi_id', Auth::user()->klasifikasi_id)->get();
        return view('testing.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $code_testing = [
            'table' => 'trainings',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'LQ-'
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
            'penjualan.required' => 'Kolom Penjualan wajib diisi',
            'kategori.required' => 'Kolom Kategori wajib diisi',
            'berat.required' => 'Kolom Berat wajib diisi',
            'ukuran.required' => 'Kolom Ukuran wajib diisi',
            'bentuk.required' => 'Kolom bentuk wajib diisi',
            'jumlahpeminat.required' => 'Kolom Jumlah Peminat wajib diisi',

        ]);


        $code = IdGenerator::generate($code_testing);
        $request->request->add(['code' => $code]);

        $testing = Testing::create($request->all());

        return redirect('/testing')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testing = Testing::find($id);
        return view('testing.detail',compact('testing'));
        // return view('arsip.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testing = Testing::findorfail($id);
        return view('testing.edit',compact('testing'));
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
        $testing = Testing::findorfail($id);
        $testing->update($request->all());
        return redirect('/testing')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testing = Testing::find($id);
        $testing->delete();
        return redirect('/testing')->with('succes','success delete data');
    }

    public function testingExport()
    {
        return Excel::download(new TestingExport,'Testing.xlsx');
    }

    public function testingImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataTesting', $nameFile);

        Excel::import(new TestingImport, public_path('/dataTesting/'.$nameFile));
        return redirect('/testing');
    }

    public function templateTesting()
    {
        return Excel::download(new TestingTemplate,'TemplateTesting.xlsx');
    }

}
