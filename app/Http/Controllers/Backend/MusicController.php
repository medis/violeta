<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMusic;
use App\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    protected $music;

    protected $request;

    public function __construct(Music $music, Request $request)
    {
        $this->music = $music;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $music = $this->music->ordered('desc')->orderBy('updated_at', 'desc')->paginate(30);

        return view('backend.music.index', compact('music'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vars = [
            'entity' => $this->music->newInstance(),
            'page_title' => 'Create song',
            'route' => $this->music->url->store,
            'types' => $this->music->getTypes()
        ];

        return view('backend.music.form', compact('vars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMusic $request)
    {
        if ($request->get('featured')) {
            // This song needs to be featured.
            // Unfeature any fratured music.
            $this->music->unfeatureMusic();
        }

        $code = $this->music->parseCode($request->source);

        $this->music->create([
            'title' => $request->title,
            'source' => $code,
            'type' => $request->type,
            'featured' => $request->get('featured') ? true : false,
            'weight' => $request->get('weight'),
            'big' => $request->get('big') ? true : false,
        ]);

        return redirect()->route('backend.music.index')->with('status', 'Song created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        $vars = [
            'entity' => $music,
            'page_title' => 'Edit song',
            'types' => $this->music->getTypes(),
            'route' => $music->url->update
        ];
        return view('backend.music.form', compact('vars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMusic $request, Music $music)
    {
        if ($request->get('featured')) {
            // This music needs to be featured.
            // Unfeature currect one.
            $this->music->unfeatureMusic();
        }

        $code = $this->music->parseCode($request->source);

        $music->title = $request->title;
        $music->source = $code;
        $music->type = $request->type;
        $music->featured = $request->get('featured') ? true : false;
        $music->enabled = $request->get('enabled') ? true : false;
        $music->weight = $request->weight;
        $music->big = $request->get('big') ? true : false;
        $music->save();

        return redirect()->route('backend.music.index')->with('status', 'Song updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Music $music
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Music $music)
    {
        $music->delete();
        return redirect()->route('backend.music.index')->with('status', 'Song deleted.');
    }
}
