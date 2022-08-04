<?php

namespace App\Http\Controllers;


use App\Models\Arsip;
use App\Models\UnitKerja;
use App\Models\Klasifikasi;
use App\Models\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $unitkerja = UnitKerja::All();
        $dataunitkerja = [];
        foreach($unitkerja as $item){
            $dataunitkerja[] = $item->unitkerja;
        }
        $total = UnitKerja::All();
        //dd($dataunitkerja);
        return view('dashboard',compact('dataunitkerja'));
    }
}
