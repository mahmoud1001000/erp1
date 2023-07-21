<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatInstallmentSytemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installment_systems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id');
            $table->string('name');
            $table->integer('number');
            $table->integer('period');
            $table->string('type',10 );

            $table->decimal('benefit', 5, 2);
            $table->string('benefit_type',10);
            $table->decimal('latfines', 5, 2);
            $table->string('latfinestype',10);


            $table->string('description')->nullable();
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
        Schema::dropIfExists('installment_systems');
    }
}

