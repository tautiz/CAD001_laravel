<?php

namespace App\Repositories;

use App\Models\PaymentType;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PaymentTypesRepository.
 */
class PaymentTypesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return PaymentType::class;
    }
}
