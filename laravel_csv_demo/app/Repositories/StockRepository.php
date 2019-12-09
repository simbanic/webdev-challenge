<?php

namespace App\Repositories;

use App\Models\Stock;

class StockRepository implements StockRepositoryInterface
{
    /**
     * Get particular stock by id
     *
     * @param string
     */
    public function get($id)
    {
        return Stock::find($id);
    }

    /**
     * Insert stock
     *
     * @param array
     */
    public function insert(array $options)
    {
        return Stock::save($options);
    }

    /**
     * Get all stock.
     *
     * @return mixed
     */
    public function all()
    {
        return Stock::all();
    }

    /**
     * Get all stocks.
     *
     * @return mixed
     */
    public function getCategoryWiseMonthySpending()
    {
        // make this a scope method
        return ((new Stock())->getCategoryWiseMonthySpending());
    }

}
