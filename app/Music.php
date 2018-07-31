<?php

namespace App;

use App\Presenters\Music\UrlPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use medis\Sortable\Sortable;
use medis\Sortable\SortableTrait;

class Music extends BaseModel implements Sortable
{
    use SortableTrait, FeaturedTrait;

    public $sortable = [
        'order_column' => 'weight'
    ];

    protected $fillable = ['title', 'type', 'source', 'featured'];

    protected static $types = [
        'youtube' => 'youtube'
    ];

    protected $appends = [
        'url'
    ];

    /**
     * Return available types of music links.
     */
    public function getTypes() {
        return self::$types;
    }

    /**
     * Parse and return youtube song id from url.
     */
    public function parseCode($link) {
        preg_match('/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/', $link, $matches);
        return (!empty($matches) && strlen($matches[7]) == 11) ? $matches[7] : false;
    }

    /**
     * Return link to youtube.
     */
    public function getLink() {
        return !empty($this->source) ? 'https://www.youtube.com/watch?v=' . $this->source : '';
    }

    public function getUrlAttribute()
    {
        return new UrlPresenter($this);
    }
}
