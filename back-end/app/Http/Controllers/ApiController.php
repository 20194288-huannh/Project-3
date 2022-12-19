<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    const HTTP_STATUS_SUCCESS = 200;
    const HTTP_STATUS_SERVER_ERROR = 500;
    public function response($data, $status = self::HTTP_STATUS_SUCCESS, $headers = [])
    {
        $headers['Content-Type'] = 'application/json';

        return response()->json($data, $status, $headers, JSON_UNESCAPED_SLASHES);
    }
    public function responseOk(mixed $data)
    {
        return $this->response(['success' => true, 'data' => $data]);
    }
    public function responseError(\Throwable $ex)
    {
        return $this->response([
            'message' => $ex->getMessage()
        ], self::HTTP_STATUS_SERVER_ERROR);
    }
}
