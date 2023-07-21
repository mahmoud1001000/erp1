<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('installment_id');
            $table->integer('business_id');
            $table->integer('contact_id');
            $table->integer('transaction_id');
            $table->integer('payment_id')->nullable();
            $table->integer('system_id');
            $table->integer('installment_number')->nullable();

            $table->decimal('installment_value',20,2	);
            $table->integer('number');

            $table->integer('period');
            $table->string('type',10);

            $table->decimal('benefit',5,2);
            $table->string('benefit_type',10);
            $table->decimal('benefit_value',10,2)->nullable();

            $table->decimal('latfines',10,2)->nullable();
            $table->string('latfinestype',10)->nullable();
            $table->decimal('latfines_value',10,2)->nullable();
            $table->decimal('paid_value',10,2);
            $table->date('paid_date')->nullable();

            $table->date('installmentdate')->nullable();
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
        Schema::dropIfExists('installments');
    }
}
