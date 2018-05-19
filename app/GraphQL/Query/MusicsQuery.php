<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Music;

class MusicsQuery extends Query
{
    protected $attributes = [
        'name' => 'music'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Music'));
    }


    public function args()
    {
        return [
            'featured' => [
                'name' => 'featured',
                'type' => Type::boolean()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['featured'])) {
            return Music::where('featured', $args['featured'])->get();
        }

        return Music::all();
    }
}