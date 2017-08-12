<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class InstagramTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($data)
    {
        return [
            'images' => $data['images'],
            'comments' => $data['comments']['data']
        ];
    }
}
