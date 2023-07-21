<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessShareCapital extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('business', 'sharenumber')){

            Schema::table('business', function (Blueprint $table) {
                $table->integer('sharenumber');
            });
        }

        if (!Schema::hasColumn('business', 'capital')){

            Schema::table('business', function (Blueprint $table) {
                $table->decimal('capital',10,2);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
