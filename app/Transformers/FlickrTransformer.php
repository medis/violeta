<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class FlickrTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($data)
    {
        return [
            'thumbnail' => $data['url_s'],
            'image'     => $data['url_z'],
            'original'  => $data['url_o']
        ];
    }
}
