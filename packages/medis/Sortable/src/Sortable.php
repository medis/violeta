<?php

namespace medis\Sortable;

use Illuminate\Database\Query\Builder;

interface Sortable {

    /**
     * Ordered scope.
     * @param $query
     * @return $query
     */
    public function scopeOrdered($query);
}