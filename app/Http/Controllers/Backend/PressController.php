<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Press;
use Illuminate\Http\Request;

class PressController extends Controller
{

    protected $press;

    protected $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Press $press, Request $request)
    {
        $this->press = $press;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presses = $this->press->orderBy('date', 'desc')->paginate(30);

        return view('backend.press.index', compact('presses'));
    }

    public function create()
    {
        $vars = [
            'entity' => $this->press->newInstance(),
            'page_title' => 'Create Press article',
            'route' => $this->press->url->store
        ];

        return view('backend.press.create', compact('vars'));
    }

    public function store()
    {
        $payload = $this->request->validate([
            'title' => 'required',
            'source' => 'required',
            'link' => 'required|url',
            'date' => 'date_format:Y-m-d',
        ]);

        $this->press->create($payload);

        return redirect($this->press->url->index)->with('status', 'Press created.');
    }
}