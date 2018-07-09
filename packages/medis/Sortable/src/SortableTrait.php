<?php

namespace medis\Sortable;

trait SortableTrait {

    /**
     * Ordered scope.
     * @param $query
     * @param string $direction
     * @return $query
     */
    public function scopeOrdered($query, string $direction = 'asc')
    {
        return $query->orderBy($this->determineOrderColumnName(), $direction);
    }

    /**
     * Get order column name.
     * @return string
     */
    protected function determineOrderColumnName(): string
    {
        return $this->sortable['order_column'] ?? 'weight';
    }
}