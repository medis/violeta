<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Show;

class ShowsQuery extends Query
{
    protected $attributes = [
        'name' => 'shows'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Show'));
    }


    public function args()
    {
        return [
            'first' => [
                'name' => 'first',
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['first'])) {
            return Show::take($args['first'])->get();
        }

        return Show::all();
    }
}