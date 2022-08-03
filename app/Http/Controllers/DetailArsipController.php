<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\DetailArsip;
use Illuminate\Http\Request;

class DetailArsipController extends Controller
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
    public function create($arsip_id)
    {
        $arsip = Arsip::find($arsip_id);
        $detailarsip = DetailArsip::all();
        return view('file.add',compact('arsip','detailarsip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $arsip_id)
    {
        //masih harus di perbaikin!!!
        //dd($request);
        // $request->request->add(['arsip_id' => $arsip_id]);
            $detailarsip = new DetailArsip();
            $detailarsip->arsip_id = $request->arsip_id;
            $file = $request->file;
            $name = time().'.'.$file->getClientOriginalExtension();
            $request->file->move('files', $name);
            $detailarsip->file=$name;
            $detailarsip->save();
            return back()->with('succes','success add data');
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
    public function edit($id, $arsip_id)
    {
        $detailarsip = DetailArsip::findorfail($id);
        return view ('file.edit',compact('detailarsip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $arsip_id)
    {
        $detailarsip = DetailArsip::findorfail($id);
        $detailarsip->update($request->all());
        return redirect()->route('detailarsip.create', ['id' => $arsip_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = DetailArsip::find($id);
        $file->delete();
        //return redirect('/question')->with('succes','success delete data');
        return back()->with('succes','success delete data');
    }
}
