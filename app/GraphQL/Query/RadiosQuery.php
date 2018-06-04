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

    public function resolve($root, $args)
    {
        return Radio::all();
    }
}