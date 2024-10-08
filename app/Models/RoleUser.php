<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'role_user';

   //protected $table = 'regist_training';

    public function role(){
        return $this->belongsTo(Role::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
