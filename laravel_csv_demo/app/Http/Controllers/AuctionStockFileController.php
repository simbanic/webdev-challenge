<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuctionStockFile as AuctionStockFileRequest;
use App\Http\Resources\AgreegateStock as AgreegateStockResource;

use App\Repositories\AuctionStockFileRepositoryInterface;
use App\Repositories\StockRepositoryInterface;

use App\Jobs\ImportInventoryFromAuctionFile;

use Illuminate\Support\Facades\Storage;

class AuctionStockFileController extends AppController
{
    protected $stockFile;
    protected $stock;

    /**
     * AuctionStockFileController Constructor
     */
    public function __construct(AuctionStockFileRepositoryInterface $stockFile, StockRepositoryInterface $stock)
    {
        $this->stockFile = $stockFile;
        $this->stock = $stock;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AuctionStockFileRequest $request)
    {        
        $uploadedFile = $request->file('file');

        $fileName = $uploadedFile->getClientOriginalName();
        $fileExt = $uploadedFile->getClientOriginalExtension();

        Storage::disk('local')->putFileAs(
            'files',
            $uploadedFile,
            $fileName
        );

        $fileRecord = [
            'name' => $fileName,
            'ext' => $fileExt,
            'status' => 'uploaded',
        ];

        $this->stockFile->insert($fileRecord);

        //ImportInventoryFromAuctionFile::dispatchNow(Storage::get($fileName));
        ImportInventoryFromAuctionFile::dispatchNow(storage_path('app') . '/files/' . $fileName);

        $stock = $this->stock->getCategoryWiseMonthySpending();

        return new AgreegateStockResource($stock);
    }
}
