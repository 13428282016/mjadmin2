<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    const STATUS_DISABlED=0;
    const STATUS_ENABLE=1;
    public function admins(){
        return $this->belongsToMany('App\Admin', 'mid_admin_role','admin_id','role_id');
    }

    public  function authorities(){
        return $this->belongsToMany('App\Authority','mid_role_authority');
    }
    public  function scopeEnable($query){
        return $query->where('status',self::STATUS_ENABLE);
    }
}
