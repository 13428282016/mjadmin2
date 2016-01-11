<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorityGroup extends Model
{
    //
    const STATUS_DISABlED=0;
    const STATUS_ENABLE=1;
    public  function scopeEnable($query){
        return $query->where('status',self::STATUS_ENABLE);
    }
    public function authoritys(){

        return $this->hasMany('App\Authority','group_id');
    }
}
