<?php

namespace App\Http\Controllers;

use App\Models\Pengajuaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use Response;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = Pengajuaan::all();
        //dd($request);
        $request = Pengajuaan::orderBy('created_at', 'DESC')->get();
         return view('requestRecord',compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $arsip_id)
    {
        $code = [
            'table' => 'pengajuaans',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'RQS-'
        ];

        //dd($arsip_id);
        $code_pengajuan = IdGenerator::generate($code);
        $request->request->add(['code' => $code_pengajuan]);
        //$arsip->code = IdGenerator::generate($code_pengajuan);
        $request->request->add(['user_id' => $request->user()->id]);
        $request->request->add(['arsip_id' => $arsip_id]);

        $pengajuaan = Pengajuaan::create($request->all());

        //return redirect('/arsip')->with('succes','success request arsip');
        return redirect('/requestrecord')->with('succes','success request arsip');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuaan = Pengajuaan::find($id);
        return view('pengajuaanDetail', compact('pengajuaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengajuaan = Pengajuaan::findorfail($id);
        return view('approvalRequest', compact('pengajuaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $request_id)
    {
        //dd($pengajuaan);
        $pengajuaan = Pengajuaan::findOrFail($request_id);
        $input = $request->all();
        $pengajuaan ->fill($input)->save();
        // $pengajuaan = Pengajuaan::find($id);
        // $pengajuaan->description = $request->input('description');
        // $pengajuaan->status = $request->input('status');
        // $pengajuaan->code = $request->input('code');
        // $student->update();
        return redirect('/requestrecord')->with('succes','success');
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
