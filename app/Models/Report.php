<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'reports';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_arsip(){
        return $this->belongsTo('App\Models\DetailArsip', 'file_id');
    }
}
