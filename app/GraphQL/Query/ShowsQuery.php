<?php

namespace App\GraphQL\Query;

use App\GraphQL\Type\PaginationType;
use Carbon\Carbon;
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
        return new PaginationType('Show');
    }


    public function args()
    {
        return [
            'first' => [
                'name' => 'first',
                'type' => Type::int()
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
                'description' => 'Display a specific page',
            ],
            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
                'description' => 'Limit the items per page',
            ],
            'upcoming' => [
                'name' => 'upcoming',
                'type' => Type::boolean(),
                'description' => 'Show only upcoming shows'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['first'])) {
            return Show::take($args['first'])->get();
        }

        if (isset($args['upcoming'])) {

            if (isset($args['limit']) && isset($args['page'])) {
                return Show::whereDate('date', '>=', Carbon::now('Europe/London'))
                            ->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0);
            }

            return Show::whereDate('date', '>=', Carbon::now('Europe/London'));
        }

        return Show::orderBy('date', 'desc')->paginate($args['limit'] ?? 20, ['*'], 'page', $args['page'] ?? 0);
    }
}