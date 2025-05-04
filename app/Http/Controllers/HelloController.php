<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as HTTPResponse;
use Inertia\Inertia;
use Inertia\Response;

class HelloController extends Controller
{
    public function create(Request $request): HTTPResponse
    {
        return response("HELLO?", 200);
        // return Inertia::render('hello', [
        //     'msg' => "GET - This is a response from a Rest API made with Laravel",
        // ]);
    }

    public function store(Request $request): Response
    {
        return Inertia::render('hello', [
            'msg' => "POST - This is a response from a Rest API made with Laravel",
        ]);
    }

    public function destroy(Request $request): Response
    {
        return Inertia::render('hello', [
            'msg' => "DELETE - This is a response from a Rest API made with Laravel",
        ]);
    }
}