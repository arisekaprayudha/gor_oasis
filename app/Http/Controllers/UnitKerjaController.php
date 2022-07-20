<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\facades\Excel;
use App\Imports\UnitKerjaImport;
use App\Exports\UnitkerjaExport;
use App\Exports\UnitKerjaTemplate;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitkerja = UnitKerja::all();
        //dd($unitkerja);
        return view('unitkerja.index',compact('unitkerja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unitkerja.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code_unitkerja = [
            'table' => 'unit_kerjas',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'UNT-'
        ];

        $request->validate([

            'unitkerja' => 'required',


        ], [
           
            'unitkerja.required' => 'Kolom Unit Kerja wajib diisi',

        ]);


        $code = IdGenerator::generate($code_unitkerja);
        $request->request->add(['code' => $code]);

        $unitkerja = UnitKerja::create($request->all());

        return redirect('/unitkerja')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unitkerja = UnitKerja::find($id);
        return view('unitkerja.detail',compact('unitkerja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unitkerja = UnitKerja::findorfail($id);
        return view('unitkerja.edit',compact('unitkerja'));
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
        $unitkerja = UnitKerja::findorfail($id);
        $unitkerja->update($request->all());
        return redirect('/unitkerja')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitkerja = UnitKerja::find($id);
        $unitkerja->delete();
        return redirect('/unitkerja')->with('succes','success delete data');
    }

    public function unitkerjaExport()
    {
        return Excel::download(new UnitkerjaExport,'Unitkerja.xlsx');
    }

    public function unitkerjaImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataArsip', $nameFile);

        Excel::import(new UnitKerjaImport, public_path('/dataunitkerja/'.$nameFile));
        return redirect('/unitkerja');
    }

    public function templateUnitkerja()
    {
        return Excel::download(new UnitKerjaTemplate,'TemplateUnitKerja.xlsx');
    }
}
