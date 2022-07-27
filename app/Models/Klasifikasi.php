<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'klasifikasis';

    public function arsip(){
        return $this->hasMany('App\Models\Arsip');
    }

    public function index(){
        return $this->hasMany('App\Models\Index');
    }

    public function user(){
        return $this->hasMany('App\Models\User');
    }
}
