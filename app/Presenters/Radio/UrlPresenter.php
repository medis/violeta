<?php

namespace App\Presenters\Radio;

use App\Radio;

class UrlPresenter
{
    protected $object;

    /**
     * UrlPresenter constructor.
     * @param Radio $object
     */
    public function __construct(Radio $object)
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
        return route('backend.radio.destroy', $this->object);
    }

    public function edit()
    {
        return route('backend.radio.edit', $this->object);
    }

    public function show()
    {
        return route('backend.radio.show', $this->object);
    }

    public function update()
    {
        return route('backend.radio.update', $this->object);
    }

    public function create()
    {
        return route('backend.radio.create');
    }

    public function store()
    {
        return route('backend.radio.store');
    }

    public function index()
    {
        return route('backend.radio.index');
    }
}