<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\facades\Excel;
use App\Imports\KlasifikasiImport;
use App\Exports\KlasifikasiExport;
use App\Exports\KlasifikasiTemplate;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$klasifikasi = Klasifikasi::all();
        //dd($unitkerja);
        return view('klasifikasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klasifikasi.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'klasifikasi' => 'required',


        ], [
           
            'klasifikasi.required' => 'Kolom Klasifikasi Kerja wajib diisi',

        ]);


        $code_klasifikasi = [
            'table' => 'klasifikasis',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'KLS-'
        ];


        $code = IdGenerator::generate($code_klasifikasi);
        $request->request->add(['code' => $code]);

        $klasifikasi = Klasifikasi::create($request->all());

        return redirect('/klasifikasi')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $klasifikasi = Klasifikasi::find($id);
        return view('klasifikasi.detail',compact('klasifikasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $klasifikasi = Klasifikasi::findorfail($id);
        return view('klasifikasi.edit',compact('klasifikasi'));
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
        $klasifikasi = Klasifikasi::findorfail($id);
        $klasifikasi->update($request->all());
        return redirect('/klasifikasi')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klasifikasi = Klasifikasi::find($id);
        $klasifikasi->delete();
        return redirect('/klasifikasi')->with('succes','success delete data');
    }

    public function klasifikasiExport()
    {
        return Excel::download(new KlasifikasiExport,'Klasifikasi.xlsx');
    }

    public function klasifikasiImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataKlasifikasi', $nameFile);

        Excel::import(new KlasifikasiImport, public_path('/dataKlasifikasi/'.$nameFile));
        return redirect('/klasifikasi');
    }

    public function templateKlasifikasi()
    {
        return Excel::download(new KlasifikasiTemplate,'TemplateKlasifikasi.xlsx');
    }
}
