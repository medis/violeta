<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Radio;
use Illuminate\Http\Request;

class RadioController extends Controller
{
    protected $radio;
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @param Radio $radio
     * @param Request $request
     */
    public function __construct(Radio $radio, Request $request)
    {
        $this->radio = $radio;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $radios = $this->radio->orderBy('updated_at', 'desc')->paginate(30);

        return view('backend.radio.index', compact('radios'));
    }

    public function create()
    {
        $vars = [
            'entity' => $this->radio->newInstance(),
            'page_title' => 'Create Radio',
            'route' => $this->radio->url->store
        ];

        return view('backend.radio.form', compact('vars'));
    }

    public function store()
    {
        $payload = $this->request->validate([
            'title' => 'required',
            'link' => 'required|url',
        ]);

        $this->radio->create($payload);

        return redirect($this->radio->url->index)->with('status', 'Radio created.');
    }

    /**
     * @param Radio $radio
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Radio $radio)
    {
        $vars = [
            'entity' => $radio,
            'page_title' => 'Edit Radio',
            'route' => $radio->url->update
        ];

        return view('backend.radio.form', compact('vars'));
    }

    /**
     * @param Radio $radio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Radio $radio)
    {
        $payload = $this->request->validate([
            'title' => 'required',
            'link' => 'required|url',
        ]);

        $payload['enabled'] = $this->request->get('enabled') ? true : false;

        $radio->update($payload);

        return redirect($radio->url->index)->with('status', 'Radio updated.');
    }

    public function destroy(Radio $radio)
    {
        $radio->delete();
        return redirect($this->radio->url->index)->with('status', 'Radio deleted.');
    }
}