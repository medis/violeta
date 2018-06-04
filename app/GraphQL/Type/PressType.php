<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class PressType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Press',
        'description' => 'A press'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the show'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Press title'
            ],
            'source' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Press source'
            ],
            'date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Press date'
            ],
            'link' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Press link'
            ],
            'enabled' => [
                'type' => Type::boolean(),
                'description' => 'Whether radio is enabled'
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Created date'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Updated date'
            ]
        ];
    }
}