<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['nameRole'];
    protected $table = 'hrmlmsroles';
    public function user(){
        // return $this->belongsTo(User::class);
        return $this->belongsToMany('App\Models\User');
        // return $this->belongsTo('App\Models\User');
        //return $this->hasManyThrough('App\Models\User');
    }
    
    public function permission(){
        return $this->belongsToMany(Permission::class);
    }
    
}