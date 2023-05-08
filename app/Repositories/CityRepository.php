<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CrudInterface;

class CityRepository implements CrudInterface
{
    public function paginate($limit = 15)
    {
        return City::latest()->paginate($limit);
    }

    public function create(array $data)
    {
        return City::create($data);
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function update($model, array $data)
    {
        return $model->update($data);
    }
}
