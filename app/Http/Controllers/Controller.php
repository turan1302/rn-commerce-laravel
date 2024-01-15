<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sendResponse($message,$data=[])
    {
        $result = [
            "success" => true,
            "message" => $message,
            "data" => $data
        ];

        return response()->json($result,200);
    }

    public function sendError($message,$errorData=[])
    {
        $result = [
            "success" => false,
            "message" => $message
        ];

        if (!empty($errorData)){
            $result['data'] = $errorData;
        }

        return response()->json($result);
    }
}
