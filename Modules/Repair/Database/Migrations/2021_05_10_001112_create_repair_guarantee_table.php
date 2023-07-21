<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairGuaranteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_guarantee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('business_id')->unsigned();
            $table->foreign('business_id')
                ->references('id')->on('business')
                ->onDelete('cascade');
            $table->integer('location_id')
                ->nullable()->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
                ->onDelete('cascade');
            $table->string('job_sheet_no');
            $table->enum('service_type', ['carry_in', 'pick_up', 'on_site']);
            $table->text('pick_up_on_site_addr')
                ->nullable();

            $table->integer('variation_id');
            $table->integer('transaction_id');
            $table->integer('supplier_id');
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
        Schema::dropIfExists('repair_guarantee');
    }
}
