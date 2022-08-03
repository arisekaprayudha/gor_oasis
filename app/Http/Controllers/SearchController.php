<?php

namespace App\Http\Controllers;

use App\Models\Index;
use App\Models\Arsip;
use App\Models\Klasifikasi;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Auth;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $index = Index::all();
        $unitkerja = UnitKerja::all();
        $klasifikasi = Klasifikasi::all();
        return view('filtering',compact('index','unitkerja','klasifikasi'));
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
        try {
            $getklasifikasi = $request->klasifikasi_id;
            $getunitkerja = $request->unitkerja_id;

            $index = Index::all();
            if($getklasifikasi == NULL){
                $arsip = Arsip::where('unitkerja_id','=',$getunitkerja)->get();
            }elseif($getunitkerja == NULL){
                $arsip = Arsip::where('index_id','=',$getklasifikasi)->get();
            }else{
                $arsip = Arsip::where('unitkerja_id','=',$getunitkerja)->where('index_id','=',$getklasifikasi)->get();
            }

            $tahun = Arsip::distinct()->get(['tahun']);
            $klasifikasi = Klasifikasi::all();
            $unitkerja = UnitKerja::all();
            $data_unitkerja = Arsip::where('klasifikasi_id','=',$getklasifikasi)->where('unitkerja_id', Auth::user()->unitkerja_id)->get();
            //dd($data_unitkerja);
            return view('arsip.index',compact('tahun','klasifikasi','index','arsip','unitkerja','data_unitkerja'));

        }catch (\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
