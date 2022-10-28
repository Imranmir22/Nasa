<?php

namespace App\Exceptions;

use Exception;

class GateException extends Exception
{
    //
    // public function register()
    // {
    // $this->reportable(function (GateException $e) {
    //     //
    // });
    // }

    public function report()
    {
        return 'false';
      
        return response("not found bro",429);
    }
    // public function report()
    // {
    //     $this->renderable(function (GateException $e, $request) {
    //            return response('Sorry, validation failed.', 422);
            
    //     });
    // }
}
