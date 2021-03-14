<?php

use Symfony\Component\HttpKernel\Exception\HttpException;

if (! function_exists("abort_with_exception")) {
    /**
     * Throw an HTTP exception and log the exception.
     *
     * @param int $statusCode
     * @param string $message
     * @param Throwable $exception
     */
    function abort_with_exception(int $statusCode, string $message, Throwable $exception)
    {
        report($exception);

        throw new HttpException($statusCode, $message, $exception);
    }
}
