<?php

namespace App\Traits;

trait ApiResponse
{
    public function successResponse($data,$code = 200,$msj='')
    {
        return response()->json(array("data" => $data, "code"=>200, "msj"=> ''));
    }
}