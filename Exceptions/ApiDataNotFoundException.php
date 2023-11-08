<?php

namespace Exceptions;

class ApiDataNotFoundException extends \Exception
{
    /**
     * DatabaseException constructor.
     *
     * @param string $message The exception message
     * @param int $code The exception code (optional)
     * @param \Throwable|null $previous The previous exception (optional)
     */
    public function __construct($message, $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the error response in JSON format.
     *
     * @return string
     */
    public function getErrorResponse()
    {
        $errorResponse = [
            'success' => false,
            'error' => [
                'message' => $this->getMessage(),
                'code' => $this->getCode(),
            ],
        ];

        return json_encode($errorResponse);
    }
}
