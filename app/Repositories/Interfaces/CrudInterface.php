<?php

namespace App\Repositories\Interfaces;

interface CrudInterface
{
    public function paginate($limit = 15);
    public function create(array $data);
    public function delete($model);
    public function update($model, array $data);

}
