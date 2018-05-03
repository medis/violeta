<?php

namespace App;

use App\Presenters\Radio\UrlPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Radio extends Model
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
