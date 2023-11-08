<?php

namespace Interfaces;

interface ResponseInterface
{
    public function success($data);
    public function error($message);
}

?>