<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorPageController extends Controller
{
    public function Error401()
    {
        return abort('401');
    }
    public function Error402()
    {
        return abort('402');
    }
    public function Error403()
    {
        return abort('403');
    }
    public function Error404(Request $request)
    {
        dd($request);
        return abort('404');
    }
    public function Error405()
    {
        return abort('405');
    }
    public function Error500()
    {
        return abort('500');
    }
}
