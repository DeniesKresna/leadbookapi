<?php

namespace App\Models;

use App\Traits\ModelHelper;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use ModelHelper;
    protected $fillable = [
        'name', 'image','address','phone','description'
    ];
    public $filterable = ['name','address','phone'];

	protected $appends = ['isFavourite'];
	protected $hidden = ['users'];

    public function users(){
        return $this->belongsToMany("App\Models\User");
    }

    public function scopeFilter($query)
    {
        $this->filter_model($query, $this);
    }

    public function getIsFavouriteAttribute($value)
    {
        $result = false;
        $users = $this->users;        
        foreach($users as $user){
            if($user->id == auth()->user()->id){
                $result = true;
                break;
            }
        }
        return $result;
    }
}
