<?php

namespace App\Exceptions;

use App\helper\Constants;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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


        if ($exception instanceof ModelNotFoundException && $request->wantsJson()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        if ($exception instanceof UnauthorizedHttpException){
            return response()->json(['message' => 'Unauthorized'], 403);
        }

//        if (method_exists($exception,'getStatusCode' )&&$exception->getStatusCode() == 404) {
//            $message=Constants::getDefaultErrorMessage();
//            if ($exception->getMessage()!=null)
//                $message=$exception->getMessage();
//
//        return response()->view('errors/404',['message'=>$message],404);
//        }
        return parent::render($request, $exception);
    }
}
