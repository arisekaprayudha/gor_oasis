<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\facades\Excel;
use App\Imports\JadwalImport;
use App\Exports\JadwalExport;
use App\Exports\JadwalTemplate;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Response;

use Auth;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index',compact('jadwal'));
        //return view('arsip.index',compact('index','arsip','unitkerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = DB::table('users') ->join('role_user', 'users.id', '=', 'role_user.user_id')->select('users.name', 'users.name')->where('role_id', '3')->get();
        return view('jadwal.add',compact('student'));
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
        $code_jadwal = [
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


        $code = IdGenerator::generate($code_jadwal);
        $request->request->add(['code' => $code]);

        $jadwal = Jadwal::create($request->all());

        return redirect('/jadwal')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwal.detail',compact('jadwal'));
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
        $jadwal = Jadwal::findorfail($id);
        return view('jadwal.edit',compact('jadwal'));
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
        $jadwal = Jadwal::findorfail($id);
        $jadwal->update($request->all());
        return redirect('/jadwal')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect('/jadwal')->with('succes','success delete data');
    }

    public function jadwalExport()
    {
        return Excel::download(new JadwalExport,'Jadwal.xlsx');
    }

    public function jadwalImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataJadwal', $nameFile);

        Excel::import(new JadwalImport, public_path('/dataJadwal/'.$nameFile));
        return redirect('/jadwal');
    }

    public function templateJadwal()
    {
        return Excel::download(new JadwalTemplate,'TemplateJadwal.xlsx');
    }

}
