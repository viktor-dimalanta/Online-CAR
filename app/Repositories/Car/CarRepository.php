<?php
/**
 * Created by PhpStorm.
 * User: regideon
 * Date: 12/02/2018
 * Time: 1:16 PM
 */

namespace App\Repositories\Car;


interface CarRepository
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}