<?php

namespace App\Repositories;

use App\Models\AuctionStockFile;

class AuctionStockFileRepository implements AuctionStockFileRepositoryInterface
{
    /**
     * Get particular auction stock file  by id
     *
     * @param string
     */
    public function get($id)
    {
        return AuctionStockFile::find($id);
    }

    /**
     * Insert auction stock file record
     *
     * @param string
     */
    public function insert(array $options)
    {
        (new AuctionStockFile())->save($options);
    }

    /**
     * Get all auction stock files.
     *
     * @return mixed
     */
    public function all()
    {
        return AuctionStockFile::all();
    }

}
