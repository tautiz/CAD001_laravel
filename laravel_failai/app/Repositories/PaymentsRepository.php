<?php

namespace App\Repositories;

use App\Models\Payment;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PaymentsRepository.
 */
class PaymentsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Payment::class;
    }
}
