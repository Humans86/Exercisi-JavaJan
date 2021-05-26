<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // dd($exception);

        //dd($request->path());

      //dd(Str::contains($request->path(),'api/'));

      

        if (env('APP_ENV') == 'local' || Str::contains($request->path(),'api/') )  {
            return parent::render($request, $exception);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse("Pàgina no trobada", $code = 404, $msj = 'Pàgina no trobada');
        }

        if ($exception instanceof ModelNotFoundException) {
            return $this->errorResponse("Recurs no trobat", $code = 404, $msj = 'Recurs no trobat');
        }

        return parent::render($request, $exception);
    }
}
