<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\facades\Excel;
use App\Imports\ArsipImport;
use App\Exports\ArsipExport;
use App\Exports\ArsipTemplate;
use App\Models\Index;
use App\Models\Arsip;
use App\Models\Klasifikasi;
use App\Models\UnitKerja;
use App\Models\DetailArsip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

use Auth;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Index::all();
        $arsip = Arsip::all();
        $klasifikasi = Klasifikasi::all();
        $unitkerja = UnitKerja::all();
        $data_unitkerja = Arsip::where('unitkerja_id', Auth::user()->unitkerja_id)->get();
        //dd($data_unitkerja);
        return view('arsip.index',compact('klasifikasi','index','arsip','unitkerja','data_unitkerja'));
        //return view('arsip.index',compact('index','arsip','unitkerja'));
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
        $data_index = Index::where('klasifikasi_id', Auth::user()->klasifikasi_id)->get();
        return view('arsip.add',compact('index','unitkerja','data_index','klasifikasi'));
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

            //'file'=> 'required|max:10000',
            'index_id' => 'required',
            'unitkerja_id' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
            'kondisi' => 'required',
            'jenis' => 'required',
            'media' => 'required',
            'tingkatpengembangan' => 'required',
            'lokasi' => 'required',
            'retensi' => 'required',
            'uraian' => 'required',
            'akhirRetensi' => 'required',

        ], [
            'index_id.required' => 'Kolom Index wajib diisi',
            'unitkerja_id.required' => 'Kolom Unit Kerja wajib diisi',
            'jumlah.required' => 'Kolom jumlah wajib diisi',
            'tanggal.required' => 'Kolom Tanggal wajib diisi',
            'kondisi.required' => 'Kolom Kondisi wajib diisi',
            'jenis.required' => 'Kolom Jenis wajib diisi',
            'tingkatpengembangan.required' => 'Kolom Tingkat Pengembangan wajib diisi',
            'lokasi.required' => 'Kolom Lokasi wajib diisi',
            'retensi.required' => 'Kolom Retensi wajib diisi',
            'media.required' => 'Kolom Media wajib diisi',

        ]);

          //dd($request);
          $code_arsip = [
            'table' => 'arsips',
            'field' => 'code',
            'length' => 10,
            'prefix' => 'FAA-'
        ];

        $arsip = new Arsip();
        $arsip->index_id = $request->index_id;
        //$arsip->index_id = json_encode($request->index_id);
        $arsip->code = IdGenerator::generate($code_arsip);
        $arsip->klasifikasi_id = $request->klasifikasi_id;
        $arsip->unitkerja_id = $request->unitkerja_id;
        //$arsip->klasifikasi = $request->klasifikasi;
        $arsip->kondisi = $request->kondisi;
        $arsip->jenis = $request->jenis;
        $arsip->media = $request->media;
        $arsip->tingkatpengembangan = $request->tingkatpengembangan;
        // $arsip->lemari = $request->lemari;
        // $arsip->ruangan = $request->ruangan ;
        // $arsip->noOrder = $request->noOrder;
        $arsip->lokasi = $request->lokasi;
        $arsip->retensi = $request->retensi;
        $arsip->akhirRetensi = $request->akhirRetensi;
        $arsip->tanggal = $request->tanggal;
        $arsip->uraian = $request->uraian;
        $arsip->jumlah = $request->jumlah;
        //upload pdf
        // $file= $request->file('file');
        // $filename= date('YmdHi').$file->getClientOriginalName();
        // $file-> move(public_path('files'), $filename);
        // $arsip->file=$filename;

        $arsip->save();

        $arsip_id = $arsip->id;
        
        $data = $request->all();
        //dd($data);
        // $files = [];

        // if($request->hasfile('namefile'))
        //  {
        //     foreach($request->file('namefile') as $file)
        //     {
        //         $name = time().rand(1,100).'.'.$file->extension();
        //         $file->move(public_path('files'), $name);  
        //         $files[] = $name;  
        //     }
        //  }
  
        //  $file= new DetailArsip();
        //  $file->namefile = $files;
        //  $file->save();

        foreach($request->file('file') as $file)
            {
                $name = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('files'), $name);  
                //$files[] = $name;  
                DetailArsip::create([
                    'arsip_id' => $arsip_id,
                    //'namefile' => $namefile,
                    'file' => $name,
                ]);
            }

        // foreach($request->get('namefile') as $item=>$value){

        //     $detailarsip = array(
        //         'arsip_id' => $arsip_id,
        //         'namefile' => $data['file'][$item],
        //         'file' => $data['file'][$item],
        //     );
        //     DetailArsip::create($detailarsip);
        // }

        return redirect('/arsip')->with('succes','success add data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arsip = Arsip::find($id);
        return view('arsip.detail',compact('arsip'));
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
        $arsip = Arsip::findorfail($id);
        return view('arsip.edit',compact('arsip'));
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
        $arsip = Arsip::findorfail($id);
        $arsip->update($request->all());
        return redirect('/arsip')->with('succes','success edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arsip = Arsip::find($id);
        $arsip->delete();
        return redirect('/arsip')->with('succes','success delete data');
    }

    public function arsipExport()
    {
        return Excel::download(new ArsipExport,'Arsip.xlsx');
    }

    public function arsipImport(Request $request)
    {
        $file = $request->file('file');
        $nameFile = $file->getClientOriginalName();
        $file->move('dataArsip', $nameFile);

        Excel::import(new ArsipImport, public_path('/dataArsip/'.$nameFile));
        return redirect('/arsip');
    }

    public function templateArsip()
    {
        return Excel::download(new ArsipTemplate,'TemplateArsip.xlsx');
    }

    public function download($file)
    {


            //dd($file);
        return response()->download(public_path('files/'.$file));
    }

    public function getIndex(Request $request)
    {

        $data['indices'] = Index::where("klasifikasi_id",$request->klasifikasi_id)->get(["id","index"]);
        return response()->json($data);
    }
}
