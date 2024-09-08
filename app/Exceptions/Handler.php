<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
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
        $this->reportable(function (QueryException $e) {
            if($e->getCode() === '23000'){
                Log::channel('sql')->warning($e->getMessage());
            }
            return true ;
        });

        $this->renderable(function(QueryException $e , $request) {
            if($e->getCode() == 23000){
                $message = 'foreign key constraint fails';
            }
            else{
                $message = $e->getMessage();
            }
            return redirect()->back()->withInput()->withErrors(['message'=>$message])
                ->with('info',$message);
        });
    }
}
