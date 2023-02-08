<?php

namespace App\Repositories;

use App\Models\OrderDetails;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class OrderDetailsRepository.
 */
class OrderDetailsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return OrderDetails::class;
    }
}
