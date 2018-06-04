<?php

namespace App\Http\Controllers\backend;

use App\Text;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextsController extends Controller
{
    /**
     * @var Text
     */
    private $text;

    protected $request;

    /**
     * TextsController constructor.
     * @param Text $text
     * @param Request $request
     */
    public function __construct(Text $text, Request $request)
    {
        $this->text = $text;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = $this->text->orderBy('title', 'desc')->paginate(30);

        return view('backend.texts.index', compact('texts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(Text $text)
    {
        $vars = [
            'entity' => $text,
            'page_title' => 'Edit text',
            'route' => $text->url->update
        ];

        return view('backend.texts.form', compact('vars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Text $text)
    {
        $payload = $request->validate([
            'body' => 'required',
        ]);

        tap($text)->update($payload);

        return redirect()->route('backend.text.index')->with('status', 'Text updated.');
    }
}
