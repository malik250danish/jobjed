<?php

namespace App\Http\Controllers;

use Response;

class ResponseController extends Controller
{
    public static function result($returnData = [],$message = '',$returnCode = 200){
        $error = [];
        $error['code'] = $returnCode;
        $error['data'] = $returnData;
        $error['message'] = $message;
        $error['responseTime'] = date('Y-m-d H:i:s');
        return Response::json($error, $returnCode);
    }
}
