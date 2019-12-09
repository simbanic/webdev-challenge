<?php

namespace App\Repositories;

interface AuctionStockFileRepositoryInterface
{
    /**
     * Get particular auction stock file  by id
     *
     * @param string
     */
    public function get($id);

    /**
     * Insert auction stock file record
     *
     * @param string
     */
    public function insert(array $options);

    /**
     * Get all auction stock files.
     *
     * @return mixed
     */
    public function all();

}
