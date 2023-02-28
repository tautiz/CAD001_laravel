<?php

namespace App\Managers;

use App\Repositories\AddressRepository;

class AddressManager
{
    protected $repository;
    /**
     * Instantiate manager
     *
     * @param AddressRepository $repository
     */
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    // Your methods for repository
}
