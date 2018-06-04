<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Show;
use Illuminate\Http\Request;

class showsController extends Controller
{
    protected $show;

    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param Show $show
     * @param Request $request
     */
    public function __construct(Show $show, Request $request)
    {
        $this->show = $show;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = $this->show->orderBy('date', 'desc')->paginate(30);

        return view('backend.show.index', compact('shows'));
    }

    public function create()
    {
        $vars = [
            'entity' => $this->show->newInstance(),
            'page_title' => 'Create Show',
            'route' => $this->show->url->store
        ];

        return view('backend.show.form', compact('vars'));
    }

    public function store()
    {
        $payload = $this->request->validate([
            'venue' => 'required',
            'address' => 'required',
            'date' => 'date_format:Y-m-d',
            'time' => 'date_format:H:i',
        ]);
        $payload['date'] .= " {$payload['time']}";
        
        $this->show->create($payload);

        return redirect($this->show->url->index)->with('status', 'Show created.');
    }

    public function edit(Show $show)
    {
        $vars = [
            'entity' => $show,
            'page_title' => 'Edit Show',
            'route' => $show->url->update
        ];

        return view('backend.show.form', compact('vars'));
    }

    public function update(Show $show)
    {
        $payload = $this->request->validate([
            'venue' => 'required',
            'address' => 'required',
            'date' => 'date_format:Y-m-d',
            'time' => 'date_format:H:i',
        ]);

        $payload['enabled'] = $this->request->get('enabled') ? true : false;
        $payload['date'] .= " {$payload['time']}";

        $show->update($payload);

        return redirect($show->url->index)->with('status', 'Show updated.');
    }

    public function destroy(Show $show)
    {
        $show->delete();
        return redirect($this->show->url->index)->with('status', 'Show deleted.');
    }
}
