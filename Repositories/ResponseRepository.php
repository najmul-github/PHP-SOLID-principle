<?php

namespace Repositories;

use Interfaces\ResponseInterface;

class ResponseRepository implements ResponseInterface{
    public function success($data) {
        return json_encode([
            'success' => true,
            'data' => $data
        ]);
    }

    public function error($message) {
        return json_encode([
            'success' => false,
            'error' => $message]
        );
    }
}

?>