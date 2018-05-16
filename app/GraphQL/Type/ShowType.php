<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class ShowType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Show',
        'description' => 'A show'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the show'
            ],
            'venue' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Show venue title'
            ],
            'address' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Show address'
            ],
            'date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Show date'
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