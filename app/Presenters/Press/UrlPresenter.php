<?php

namespace App\Presenters\Press;

use App\Press;

class UrlPresenter
{
    protected $press;

    /**
     * UrlPresenter constructor.
     * @param $press
     */
    public function __construct(Press $press)
    {
        $this->press = $press;
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
        return route('backend.press.destroy', $this->press);
    }

    public function edit()
    {
        return route('backend.press.edit', $this->press);
    }

    public function show()
    {
        return route('backend.press.show', $this->press);
    }

    public function update()
    {
        return route('backend.press.update', $this->press);
    }

    public function create()
    {
        return route('backend.press.create');
    }

    public function store()
    {
        return route('backend.press.store');
    }

    public function index()
    {
        return route('backend.press.index');
    }
}