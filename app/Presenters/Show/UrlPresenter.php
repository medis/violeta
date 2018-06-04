<?php

namespace App\Presenters\Show;


use App\Show;

class UrlPresenter
{
    protected $object;

    /**
     * UrlPresenter constructor.
     * @param Radio $object
     */
    public function __construct(Show $object)
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
        return route('backend.show.destroy', $this->object);
    }

    public function edit()
    {
        return route('backend.show.edit', $this->object);
    }

    public function show()
    {
        return route('backend.show.show', $this->object);
    }

    public function update()
    {
        return route('backend.show.update', $this->object);
    }

    public function create()
    {
        return route('backend.show.create');
    }

    public function store()
    {
        return route('backend.show.store');
    }

    public function index()
    {
        return route('backend.show.index');
    }
}