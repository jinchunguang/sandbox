<?php
/**
 * Created by PhpStorm.
 * User: jinchunguang
 * Date: 18-11-29
 * Time: 上午10:09
 */

namespace App\System\Facades;

use Illuminate\Support\Facades\Facade;

class Jsonify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Jsonify';
    }

}