<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            if ($exception->getCode() == 404) {
                return response()->view('errors.' . '404', [], 404);
            }

            if ($exception->getCode() == 500) {
                return response()->view('errors.' . '500', [], 500);
            }

            if ($exception->getCode() == 419) {
                return response()->view('errors.' . '419', [], 419);
            }
            if ($exception->getCode() == 2002) {
                return response()->view('errors.' . '2002', [], 2002);
            }

        }

        return parent::render($request, $exception);

        // return parent::render($request, $exception);
    }
}
