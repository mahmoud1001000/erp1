<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('business_id');
            $table->string('assetcode');
            $table->string('description',255)->nullable();
            $table->decimal('quantity', 10, 2)->default(1);
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('curentprice', 10,2)->default(0);
            $table->dateTime('purchasedate')->nullable();
            $table->dateTime('changedate')->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('assets');
    }
}
