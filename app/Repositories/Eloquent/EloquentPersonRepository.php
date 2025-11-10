<?php

namespace App\Repositories\Eloquent;

use App\Models\Person;
use App\Repositories\Contract\PersonRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentPersonRepository extends BaseRepository implements PersonRepositoryInterface
{

    public function __construct(Person $model)
    {
        parent::__construct($model);
    }

    public function existsByField(string $value, string $field = "phone"): ?Person
    {
        return $this->model->where($field, $value)->first();
    }

    public function search(string $query) : Collection
    {
        return $this->model->search($query)->get();
    }
}

