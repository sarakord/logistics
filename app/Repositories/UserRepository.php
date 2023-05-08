<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\CrudInterface;

class UserRepository implements CrudInterface
{
    public function paginate($limit = 15)
    {
        return User::latest()->paginate($limit);
    }

    public function create(array $data)
    {
        return User::create($data);
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
