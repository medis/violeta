<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use App\Text;

class TextQuery extends Query
{
    protected $attributes = [
        'name' => 'text'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Text'));
    }


    public function args()
    {
        return [
            'machine_name' => [
                'name' => 'machine_name',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['machine_name'])) {
            return Text::where('machine_name', $args['machine_name'])->get();
        }

        return [];
    }
}