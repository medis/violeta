<?php

namespace App;

trait FeaturedTrait
{

    protected static function bootFeaturedTrait()
    {
        static::updating(function ($model) {
            self::unfeatureAll($model);
        });

        static::creating(function ($model) {
            self::unfeatureAll($model);
        });
    }

    /**
     * Unfeature all songs before saving new featured song.
     * @param $model
     */
    protected static function unfeatureAll($model) {
        if (!$model->featured) {
            return;
        }

        foreach ($model->query()->where('featured', 1)->cursor() as $song) {
            $song->featured = 0;
            $song->save();
        }

    }
}