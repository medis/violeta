<?php

namespace App;

use App\Presenters\Music\UrlPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Music extends BaseModel
{
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

    public function unfeatureMusic() {
        $music = Music::where('featured', 1)->first();
        if (!empty($music)) {
            $music->featured = false;
            $music->save();
        }
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
