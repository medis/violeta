<?php

namespace App;

use App\Presenters\Text\UrlPresenter;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['body'];

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return new UrlPresenter($this);
    }
}
