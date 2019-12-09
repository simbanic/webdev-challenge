<?php

namespace App\Models;

use App\Models\AppModel;

class AuctionStockFile extends AppModel
{
    protected $table = "auction_stock_files";

    /**
    * Save the model to the database.
    *
    * @param  array  $options
    * @return bool
    */
    public function save(array $options=[])
    {
    	$this->name = $options['name'];
    	$this->ext = $options['ext'];
    	$this->status = $options['status'];

        parent::save();
    }
}
