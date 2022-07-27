<?php

namespace App\Http\Controllers;

use App\Models\DetailArsip;
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
    public function create($id)
    {
        $detailarsip = DetailArsip::find($id);
        return view('pengajuaanPeminjaman', compact('detailarsip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $file_id)
    {
        $code = [
            'table' => 'pengajuaans',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'RQS-'
        ];

        //dd($request);
        $code_pengajuan = IdGenerator::generate($code);
        $request->request->add(['code' => $code_pengajuan]);
        //$arsip->code = IdGenerator::generate($code_pengajuan);
        $request->request->add(['user_id' => $request->user()->id]);
        $request->request->add(['file_id' => $file_id]);
        //$request->request->add(['tujuan' => $request->tujuan]);

        $pengajuaan = Pengajuaan::create($request->all());
        //dd($pengajuaan);

        //return redirect('/arsip')->with('succes','success request arsip');
        return redirect('/requestrecord')->with('succes','success request arsip');
    }

    public function ajaxRequestPost(Request $request, $file_id)
    {
        // $input = $request->all();
          
        // Log::info($input);
     
        // return response()->json($data);
        // return response()->json(['success'=>'Got Simple Ajax Request.']);
    
        $code_download = [
            'table' => 'repots',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'DWN-'
        ];

        $report = new Report();
        $report->code = IdGenerator::generate($code_download);
        $report->user_id = $request->user()->id;
        $report->countdownload = $report->count+1;

        // $code_download = IdGenerator::generate($code);
        // $request->request->add(['code' => $code_download]);
        // $request->request->add(['user_id' => $request->user()->id]);
        // $request->request->add(['file_id' => $file]);
        // $report->countdownload = $report->count+1;
        // $report = Report::create($request->all());

        // $report = new Report;
        // $report->file_id=$request->namefile;
        $report->save();
        //return response()->json(['bool'=>true]);
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
