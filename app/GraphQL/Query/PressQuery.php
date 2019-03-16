<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\GraphQL\Type\PaginationType;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Press;

class PressQuery extends Query
{
    protected $attributes = [
        'name' => 'press'
    ];

    public function type()
    {
        return new PaginationType('Press');
    }


    public function args()
    {
        return [
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
                'description' => 'Limit the items per page',
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Press::orderBy('date', 'desc')->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0);
    }
}