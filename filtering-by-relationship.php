<?php

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public string $search = '';

    /**
     * Apply the search query to the model.
     * The where and orWhere methods allow you to add clauses to your query.
     * The orWhereHas method allows you to add a constraint to a query that checks the existence of a relationship.
     */
    public function applySearch($query) : Builder
    {
        return $query->where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhereHas('blog', function ($query) {
                $query->where('title', 'like', "%{$this->search}%");
            });
    }
}
