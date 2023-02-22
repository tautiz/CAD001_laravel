<?php

namespace App\Managers;

use App\Models\Product;
use App\Repositories\ProductsRepository;
use Illuminate\Database\Eloquent\Model;

class ProductsManager
{
    public function __construct(protected ProductsRepository $repository)
    {
    }

    public function getById(int $id): Model|Product
    {
        return $this->repository->getById($id);
    }
}
