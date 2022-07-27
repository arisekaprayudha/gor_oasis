<?php

namespace App\Models;
//use App\Casts\Json;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'arsips';

    // protected $casts = ['index_id' => 'array'];
    // //protected $casts = ['index_id' => Json::class];

    // public function setIndexAttribute($value)
    // {
    //     $this->attributes['index'] = json_encode($value);
    // }

    // public function getIndexAttribute($value)
    // {
    //     return $this->attributes['index'] = json_decode($value);
    // }

    public function unitkerja(){
        return $this->belongsTo('App\Models\UnitKerja');
    }

    public function index(){
        return $this->belongsTo('App\Models\Index');
    }

    public function detailarsip(){
        return $this->hasMany('App\Models\DetailArsip');
    }
}
