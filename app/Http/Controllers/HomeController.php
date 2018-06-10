<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $variables = [
            'APP_URL' => config('app.url')
        ];

        return view('welcome', compact('variables'));
    }
}
