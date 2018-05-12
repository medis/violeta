<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Radio;

class RadiosQuery extends Query
{
    protected $attributes = [
        'name' => 'radios'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Radio'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Radio::find($args['id'])->get();
        }

        return Radio::all();
    }
}