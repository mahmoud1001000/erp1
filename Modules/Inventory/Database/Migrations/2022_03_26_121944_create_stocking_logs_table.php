<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockingLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocking_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('business_id')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('variation_id')->nullable();
            $table->string('type',50)->nullable();
            $table->decimal('curent_quantity', 10,2)->default(0);
            $table->decimal('new_quantity', 10,2)->default(0);
            $table->decimal('dpp_inc_tax', 10, 2)->default(0);
            $table->decimal('sell_price_inc_tax', 10, 2)->default(0);
            $table->integer('created_by')->nullable();
            $table->string('description',255)->nullable();
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
        Schema::dropIfExists('stocking_logs');
    }
}
