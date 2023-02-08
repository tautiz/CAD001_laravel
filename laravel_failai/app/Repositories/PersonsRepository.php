<?php

namespace App\Repositories;

use App\Models\Person;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class PersonsRepository.
 */
class PersonsRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model(): string
    {
        return Person::class;
    }
}
