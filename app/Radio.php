<?php

namespace App;

use App\Presenters\Radio\UrlPresenter;

class Radio extends BaseModel
{
    protected $fillable = ['title', 'link', 'enabled'];

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new UrlPresenter($this);
    }
}
