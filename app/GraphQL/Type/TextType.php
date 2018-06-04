<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class TextType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Text',
        'description' => 'a text'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the text'
            ],
            'machine_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'text code'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'text human title'
            ],
            'body' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'text body'
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