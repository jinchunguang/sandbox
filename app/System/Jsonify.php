<?php
/**
 * Created by PhpStorm.
 * User: jinchunguang
 * Date: 18-11-29
 * Time: 上午10:11
 */

namespace App\System;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class Jsonify
{
    use ValidatesRequests;

    private $_response = ['data'=> null, 'code'=> 0, 'message'=> ''];

    public function __construct(Application $app)
    {
        //
    }

    public function success($data=null, string $message='')
    {
        $response = $this->_response;

        $response['data'] = $data;
        $response['message'] = $message;

        return response()->json($response);
    }

    public function error(string $message, int $code=1)
    {
        $response = $this->_response;

        $response['message'] = $message;
        $response['code'] = $code;

        return response()->json($response);
    }

    public function validate(Request $request, array $rules)
    {
        $validator = $this->getValidationFactory()->make($request->all(), $rules);
        if ($validator->fails()) {
            abort(400, implode('', $validator->errors()->all()));
        }
    }
}