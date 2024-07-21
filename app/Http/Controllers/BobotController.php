<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\facades\Excel;
use App\Imports\BobotImport;
use App\Exports\BobotExport;
use App\Exports\BobotTemplate;
use App\Models\Bobot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bobot = Bobot::all();
        //$unitkerja = UnitKerja::all();
        //dd($unitkerja);
        return view('bobot.index',compact('bobot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bobot.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code_bobot = [
            'table' => 'bobots',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'BBT-'
        ];

        $request->validate([

            'nama_kriteria' => 'required',
            'bobot' => 'required',
            // 'harga' => 'required',
            // 'penjualan' => 'required',
            // 'berat' => 'required',
            // 'ukuran' => 'required',
            // 'kategori' => 'required',
            // 'bentuk' => 'required',
            // 'jumlahpeminat' => 'required',


        ], [
           
            'nama_kriteria.required' => 'Nama Kategori wajib diisi',
            'bobot.required' => 'Bobot wajib diisi',
            // 'harga.required' => 'Kolom Harga wajib diisi',
            // 'penjualan.required' => 'Kolom penjualan wajib diisi',
            // 'kategori.required' => 'Kolom Kategori wajib diisi',
            // 'berat.required' => 'Kolom kategori wajib diisi',
            // 'ukuran.required' => 'Kolom ukuran wajib diisi',
            // 'bentuk.required' => 'Kolom Bentuk wajib diisi',
            // 'jumlahpeminat.required' => 'Kolom Jumlah Peminat wajib diisi',

        ]);


        $code = IdGenerator::generate($code_bobot);
        $request->request->add(['code' => $code]);

        $bobot = Bobot::create($request->all());

        return redirect('/bobot')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bobot = Bobot::find($id);
        return view('bobot.detail',compact('bobot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bobot = Bobot::findorfail($id);
        return view('bobot.edit',compact('bobot'));
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
        $bobot = Bobot::findorfail($id);
        $bobot->update($request->all());
        return redirect('/bobot')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bobot = Bobot::find($id);
        $bobot->delete();
        return redirect('/bobot')->with('succes','success delete data');
    }

    public function bobotExport()
    {
        return Excel::download(new BobotExport,'bobot.xlsx');
    }

    public function bobotImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataBobot', $nameFile);

        Excel::import(new BobotImport, public_path('/databobot/'.$nameFile));
        return redirect('/bobot');
    }

    public function templateBobot()
    {
        return Excel::download(new BobotTemplate,'TemplateBobot.xlsx');
    }
}
