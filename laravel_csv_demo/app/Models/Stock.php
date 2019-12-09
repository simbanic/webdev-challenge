<?php

namespace App\Models;

use App\Models\AppModel;
use Illuminate\Support\Facades\DB;

class Stock extends AppModel
{
    protected $table = "stocks";


    public function getCategoryWiseMonthySpending()
    {
    	return collect(Stock::select('date', 'category', DB::raw('SUM(pre_tax_amount) as total_amount'))
    		->groupBy('date', 'category')
    		->get());
    }
}
