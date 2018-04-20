<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Press;

class PressController extends Controller
{

    protected $press;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Press $press)
    {
        $this->press = $press;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $press = $this->press->orderBy('date', 'desc')->paginate(30);

        return view('backend.press.index', compact('press'));
    }

    public function create()
    {
        $press = $this->press->newInstance();

        return view('backend.press.create', compact('press'));
    }
}