<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailArsip extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'detail_arsips';

    public function arsip(){
        return $this->belongsTo('App\Models\Arsip');
    }

    public function pengajuaan(){
        return $this->hasMany(Pengajuaan::class);
    }

    public function report(){
        return $this->hasMany(Report::class);
    }
}
