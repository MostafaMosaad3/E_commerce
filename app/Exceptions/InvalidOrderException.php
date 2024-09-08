<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class InvalidOrderException extends Exception
{
    public function render(Request $request )
    {
        return redirect()->route('home')->withInput()->withErrors([$this->getMessage()])
            ->with('info' ,$this->getMessage());
    }
}
