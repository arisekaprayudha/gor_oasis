<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\facades\Excel;
use App\Imports\IndexImport;
use App\Exports\IndexExport;
use App\Exports\IndexTemplate;
use App\Models\UnitKerja;
use App\Models\Index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use Auth;


use Haruncpi\LaravelIdGenerator\IdGenerator;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Index::all();
        return view('index.index',compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitkerja = UnitKerja::all();
        return view('index.add',compact('unitkerja'));
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

            'index' => 'required',
            'subcode' => 'required|unique',
            'klasifikasi_id' => 'required',

        ], [
            'index.required' => 'Kolom Index wajib diisi',
            'subcode.unique' => 'Kolom Subcode harus unique',
            'subcode.required' => 'Kolom Subcode wajib diisi',
            'klasifikasi_id.required' => 'Kolom Unit Kerja wajib diisi',

        ]);

        //dd($request);
        $code_index = [
            'table' => 'indices',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'IDX-'
        ];

        $code = IdGenerator::generate($code_index);
        $request->request->add(['code' => $code]);

        $index = Index::create($request->all());

        return redirect('/index')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $index = Index::find($id);
        $unitkerja = UnitKerja::all();
        return view('index.detail',compact('index','unitkerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $index = Index::findorfail($id);
        $unitkerja = UnitKerja::all();
        return view('index.edit',compact('index','unitkerja'));
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
        $index = Index::findorfail($id);
        $index->update($request->all());
        return redirect('/index')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $index = Index::find($id);
        $index->delete();
        return redirect('/index')->with('succes','success delete data');
    }

    public function indexExport()
    {
        return Excel::download(new IndexExport,'Index.xlsx');
    }

    public function indexImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataIndex', $nameFile);

        Excel::import(new IndexImport, public_path('/dataIndex/'.$nameFile));
        return redirect('/index');
    }

    public function templateIndex()
    {
        return Excel::download(new IndexTemplate,'TemplateIndex.xlsx');
    }
}
