<?php

namespace App\Repositories;

use App\Models\Consignment;
use App\Repositories\Interfaces\CrudInterface;

class ConsignmentRepository implements CrudInterface
{
    public function paginate($limit = 15)
    {
        return Consignment::latest()->paginate($limit);
    }

    public function create(array $data)
    {
        return Consignment::create($data);
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
