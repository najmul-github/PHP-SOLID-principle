<?php

namespace Services;
use Repositories\ResponseRepository;

class ResponseServices 
{
    public function success($data){
        $response    = new ResponseRepository();

        return  $response->success($data);
    }
    public function error($message){
        $response    = new ResponseRepository();

        return  $response->error($message);
    }
}

?>