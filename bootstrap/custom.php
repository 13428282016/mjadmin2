<?php
/**
 * Created by PhpStorm.
 * User: wmj
 * Date: 2015/12/29
 * Time: 16:55
 */


function asset($path,$secure=false)
{

    return  ($secure?'https':'http').'://assets.mj.kankan.com/'.$path;
}


function images($path,$secure=false)
{

    return $path?( ($secure?'https':'http').'://images.mj.kankan.com/'.$path):(($secure?'https':'http').'://images.mj.kankan.com/default/user2-160x160.jpg') ;
}