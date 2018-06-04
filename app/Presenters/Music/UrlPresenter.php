<?php

namespace App\Presenters\Music;

use App\Music;

class UrlPresenter
{
    protected $object;

    /**
     * UrlPresenter constructor.
     * @param Music $object
     */
    public function __construct(Music $object)
    {
        $this->object = $object;
    }

    /**
     * @return Press route
     */
    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }
        return $this->$key;
    }

    public function delete()
    {
        return route('backend.music.destroy', $this->object);
    }

    public function edit()
    {
        return route('backend.music.edit', $this->object);
    }

    public function show()
    {
        return route('backend.music.show', $this->object);
    }

    public function update()
    {
        return route('backend.music.update', $this->object);
    }

    public function create()
    {
        return route('backend.music.create');
    }

    public function store()
    {
        return route('backend.music.store');
    }

    public function index()
    {
        return route('backend.music.index');
    }
}