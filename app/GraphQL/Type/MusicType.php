<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class MusicType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Music',
        'description' => 'a song'
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
                'description' => 'Song title'
            ],
            'type' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Song source type'
            ],
            'source' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Song source link'
            ],
            'featured' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Song is featured'
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