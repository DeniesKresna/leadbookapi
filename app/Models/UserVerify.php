<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    protected $fillable = [
        'user_id', 'code','expired','type'
    ];

    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
