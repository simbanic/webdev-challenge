<?php

namespace App\Libraries;

/**Create Facade of Model */
/** https://www.larashout.com/how-to-use-repository-pattern-in-laravel */

use Carbon\Carbon;

class CSVFile
{
    public function read($filePath)
    {
        $badData = [];
        $file = fopen($filePath,"r");

        $headers = fgetcsv($file);
        $column =  [
            'date', 
            'category', 
            'lot_title', 
            'lot_location', 
            'lot_condition', 
            'pre_tax_amount', 
            'tax_name', 
            'tax_amount'
        ];

        $i = 1;
        while(!feof($file)){

            $row = fgetcsv($file);

            //validate each column.

            //date: validate date
            //category: not empty string
            //lot title: not empty
            //lot condition: not empty
            //pre-tax amount: not empty
            //tax name: not empty
            //tax amount: not empty

            //array
            //log bad data
            
            if(!empty($row)) {

                $item = [];
                foreach ($row as $key => $value) {

                    if ($headers[$key] == 'date' && !$this->validateDate($value, 'm/d/Y')) {
                        $badData['row: ' . $i]['column: ' . $headers[$key]] = $value;                        
                    } else if (empty($value)) {
                        $badData['row: ' . $i]['column: ' . $headers[$key]] = $value;
                    }

                    if ($headers[$key] == 'date') {
                        $value = Carbon::parse($value)->format('Y-m-d');
                    }

                    $item[$column[$key]] = $value;
                }
            }

            $data[] = $item;

            $i++;
        }

        \Log::warning(json_encode([
            'File' => $filePath,
            'Bad Data' => $badData
        ]));

        fclose($file);

        return $data;
    }

    public function validateDate($date, $format = 'm/d/Y')
    {
        $d = Carbon::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

}
