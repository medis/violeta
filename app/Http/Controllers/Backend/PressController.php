<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Press;

class PressController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $press = Press::orderBy('date', 'desc')->paginate(30);

        return view('backend.press.index', compact('press'));
    }
}