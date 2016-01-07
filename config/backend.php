<?php
/**
 * Created by PhpStorm.
 * User: wmj
 * Date: 2016/1/4
 * Time: 20:02
 */

return [


    'authority'=>[
        'supers'=>['admin','root'],
        'ignores'=>['User@getProfile','Password@getReset','Password@postReset','Home@getIndex']
    ]

];