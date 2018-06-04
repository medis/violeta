<?php

namespace App\Presenters\Text;


use App\Text;

class UrlPresenter
{
    protected $object;

    /**
     * UrlPresenter constructor.
     * @param Radio $object
     */
    public function __construct(Text $object)
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
        return route('backend.text.destroy', $this->object);
    }

    public function edit()
    {
        return route('backend.text.edit', $this->object);
    }

    public function show()
    {
        return route('backend.text.show', $this->object);
    }

    public function update()
    {
        return route('backend.text.update', $this->object);
    }

    public function create()
    {
        return route('backend.text.create');
    }

    public function store()
    {
        return route('backend.text.store');
    }

    public function index()
    {
        return route('backend.text.index');
    }
}