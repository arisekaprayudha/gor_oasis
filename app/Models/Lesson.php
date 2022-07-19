<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    //protected $hiden = ['created_at','updated_at'];
    protected $guarded = ['id'];
    // protected $fillable = ['nameLesson','description','file'];
    protected $table = 'hrmlmslessons';
    public function training(){
        return $this->hasMany(Training::class);
    }

    public function trainer(){
        return $this->hasOne(Trainer::class);
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\SubcategoryTraining');
    }

    public function category(){
        return $this->belongsTo(CategoryTraining::class);
    }

    public function typelesson(){
        return $this->hasMany('App\Models\TypeLesson');
    }
}