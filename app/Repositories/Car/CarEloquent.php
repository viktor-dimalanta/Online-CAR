<?php
/**
 * Created by PhpStorm.
 * User: regideon
 * Date: 12/02/2018
 * Time: 1:19 PM
 */

namespace App\Repositories\Car;

use App\Car;

class CarEloquent implements CarRepository
{
    private $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->findBtId($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $car = $this->model->findOrFail($id);
        $car->update($attributes);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();

        return true;
    }
}