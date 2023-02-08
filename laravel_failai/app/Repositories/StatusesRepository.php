<?php

namespace App\Repositories;

use App\Models\Status;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class StatusesRepository.
 */
class StatusesRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Status::class;
    }
}
