<?php

namespace App\Traits;

trait ApiResponses{


    protected function success($message , $data = [] , $statusCode=200 ){

        $response = [
            'message' => $message,
            'status' => $statusCode
        ];

        if(!empty($data)){
             $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    protected function ok($message , $data = []  ){
        return $this->success($message, $data , 200);
    }

    protected function created($message , $data = []  ){
        return $this->success($message, $data , 201);
    }



    protected function error($message , $data=[], $statusCode ){

        $response = [
            'message' => $message,
            'status' => $statusCode
        ];

        if(!empty($data)){
             $response['data'] = $data;
        }

        return response()->json($response, $statusCode);
    }

    protected function unprocessableContent($message , $data=[] ){
        return $this->error($message, $data , 422);
    }

    protected function notFound($message , $data=[]  ){
        return $this->error($message, $data , 404);
    }

    protected function forbidden($message , $data=[] ){
        return $this->error($message, $data , 403);
    }

    public function unauthorized($message, $data=[])
    {
        return $this->error($message, $data, 401);
    }

}
