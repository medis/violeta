<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class RadioType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Radio',
        'description' => 'A radio'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the radio'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Radio title'
            ],
            'link' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Radio link'
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