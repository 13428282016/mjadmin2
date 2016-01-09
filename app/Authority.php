<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    //

     const STATUS_DISABlED=0;
    const STATUS_ENABLE=1;
    public function gruop(){

        return $this->belongsTo('App\AuthorityGroup','group_id');
    }

    public  function roles(){
        return $this->belongsToMany('App\Role','mid_role_authority','role_id','authority_id');
    }


    public  function scopeEnable($query){
        return $query->where('status',self::STATUS_ENABLE);
    }

    public function format(){

        $items=explode("|",$this->location);
        $formatedItems=[];
        foreach($items as $item)
        {

            $subItem=explode('@',$item);
            $controller=isset($subItem[0])?$subItem[0]:null;
            $action=isset($subItem[1])?$subItem[1]:null;
            if(!($controller&&$action))
            {
                continue;
            }
            $formatedItems[$controller][$action]=true;

        }
        return $formatedItems;
    }
}
