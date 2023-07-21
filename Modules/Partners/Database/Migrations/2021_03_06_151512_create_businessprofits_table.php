<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessprofitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('business_id');
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->date('duedate')->nullable();
            $table->integer('sharenumber')->nullable();
            $table->decimal('profite',10,2)->nullable();
            $table->integer('user_id');
            $table->integer('status');
            $table->string('notes',255)->nullable();

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
        Schema::dropIfExists('business_profits');
    }
}
