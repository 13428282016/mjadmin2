<?php
/**
 * Created by PhpStorm.
 * User: wmj
 * Date: 2016/1/4
 * Time: 15:49
 */
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Admin extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use SoftDeletes;

    protected $dates = ['deleted_at'];//使用软删除
    protected  $table='admins';
    protected $primaryKey='id';

    //public $timestamps=false;//timestamps是否又Eloquent自动更新
   // protected  $dataFormat='U';//设置日期字段的格式
    //protected $connection='mysql';//如果不想使用默认的数据连接，可以定义
    protected $fillable = [
        'name', 'email', 'password',
    ];//指定那些字段允许批量复制 例如当调用create方法新建一条记录时对应相反的字段的$guard

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function roles(){

        return $this->belongsToMany('App\Role','mid_admin_role');
    }


    public  function  authorities(){
        $roles=$this->roles()->enable()->with(['authorities'=>function($query){

            $query->enable();

        }])->get();


        $authorities=collect();


        foreach ($roles as $role)
        {
            $authorities= $authorities->merge( $role->authorities);
        }



        return $authorities->unique('id')->all();
    }

    public  function  hasAuthority($controller,$action){




        $supers=config('backend.authority.supers');

        if( in_array($this->username,$supers))
        {
            return true;
        }
        if(empty($controller)&&empty($action)){
            return false;
        }
        $ignores =config('backend.authority.ignores');
        foreach ($ignores as $ignore)
        {
            $items=explode('@',$ignore);
            $icontroller=isset($items[0])?$items[0]:null;
            $iaction=isset($items[1])?$items[1]:null;
            if(!($icontroller&&$iaction))
            {
                continue;
            }
            if(($controller==$icontroller&&$action==$iaction)||($controller==$icontroller&&$iaction=='*'))
            {
                return true;
            }
        }

        if(!session('authorities'))
        {
            $authorities=$this->authorities();
            $formatedAuthorities=[];
            foreach($authorities as $authority) {

                $formatedAuthority = $authority->format();
                $formatedAuthorities = array_merge_recursive($formatedAuthorities, $formatedAuthority);
            }
            session(['authorities'=>$formatedAuthorities]);

        }
        return session("authorities.$controller")=='*'|| !!session("authorities.$controller.$action");
    }



}