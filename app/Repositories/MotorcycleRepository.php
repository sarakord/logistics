<?php

namespace App\Repositories;

use App\Models\Motorcycle;
use App\Repositories\Interfaces\CrudInterface;

class MotorcycleRepository implements CrudInterface
{
    public function paginate($limit = 15)
    {
        return Motorcycle::latest()->paginate($limit);
    }

    public function create(array $data)
    {
        return Motorcycle::create($data);
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
