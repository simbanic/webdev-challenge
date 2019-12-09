<?php

namespace App\Repositories;

interface StockRepositoryInterface
{
    /**
     * Get particular stock by id
     *
     * @param string
     */
    public function get($id);

    /**
     * Insert stock
     *
     * @param array
     */
    public function insert(array $options);

    /**
     * Get all stocks.
     *
     * @return mixed
     */
    public function all();


    /**
     * Get Category Wise Monthy Spending stocks.
     *
     * @return array
     */
    public function getCategoryWiseMonthySpending();

}