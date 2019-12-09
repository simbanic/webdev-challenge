<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('category', 100)->nullable();
            $table->string('lot_title', 100)->nullable();
            $table->text('lot_location')->nullable();
            $table->string('lot_condition', 100)->nullable();
            $table->decimal('pre_tax_amount', 8, 2)->nullable();
            $table->string('tax_name', 100)->nullable();
            $table->decimal('tax_amount', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
