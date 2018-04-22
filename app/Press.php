<?php

namespace App;

use App\Presenters\Press\UrlPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    protected $fillable = ['title', 'source', 'link', 'date', 'enabled'];

    protected $appends = [
        'url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->date = new Carbon("{$model->date}", 'Europe/London');
        });
    }

    public function getUrlAttribute()
    {
        return new UrlPresenter($this);
    }
}
