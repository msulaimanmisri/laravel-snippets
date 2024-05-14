<?php
declare(strict_types=1);

/**
 * Filter Services
 * @link https://github.com/plutuss/query-filter-laravel
 */
class UserFilter extends QueryFilter
{
    public function user($value)
    {
        return $this->builder
            ->when($value, function ($query) use ($value) {
                return $query
                ->where('name', 'like', '%' . $value . '%')
                ->orWhere('email', 'like', '%' . $value . '%')
                ->orWhere('status', 'like', '%' . $value . '%');
            });
    }
}

/**
 * Model
 */
class Model {
    use HasQueryFilter;
}

/**
 * Controller
 */
class Controller {
    public function index(Model $model) {
    $model = Model::query()->filter($model)->get();
    return $model;
    }
}
