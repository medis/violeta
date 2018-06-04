<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationType extends ObjectType
{
    /**
     * PaginationType constructor.
     * @param String $typeName
     */
    public function __construct($typeName)
    {
        parent::__construct([
            'name' => $typeName . 'Pagination',
            'fields' => [
                'data' => [
                    'type' => Type::listOf(\GraphQL::type($typeName)),
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->getCollection();
                    },
                ],
                'total' => [
                    'type' => Type::nonNull(Type::int()),
                    'description' => 'Number of total items selected by the query',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->total();
                    },
                    'selectable' => false,
                ],
                'limit' => [
                    'type' => Type::nonNull(Type::int()),
                    'description' => 'Number of items returned per page',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->perPage();
                    },
                    'selectable' => false,
                ],
                'page' => [
                    'type' => Type::nonNull(Type::int()),
                    'description' => 'Current page of the cursor',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->currentPage();
                    },
                    'selectable' => false,
                ],
                'last_page' => [
                    'type' => Type::int(),
                    'description' => 'Current page of the cursor',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->lastPage();
                    },
                ],
                'from' => [
                    'type' => Type::int(),
                    'description' => 'Current page of the cursor',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->firstItem();
                    },
                ],
                'to' => [
                    'type' => Type::int(),
                    'description' => 'Current page of the cursor',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->lastItem();
                    },
                ],
                'next_page_url' => [
                    'type' => Type::string(),
                    'description' => 'Current page of the cursor',
                    'resolve' => function (LengthAwarePaginator $data) {
                        return $data->nextPageUrl();
                    }
                ],
                'prev_page_url' => [
                    'type' => Type::string(),
                    'description' => 'Current page of the cursor',
                    'resolve' => function ($data) {
                        return $data->previousPageUrl();
                    }
                ],
            ],
        ]);
    }
}