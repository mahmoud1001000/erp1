<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Artisan;

class PartnersPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /*Permission::create(['name' => 'Partners.view']);
        Permission::create(['name' => 'Partners.create']);
        Permission::create(['name' => 'Partners.edit']);
        Permission::create(['name' => 'Partners.delete']);*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* $data=Permission::where('name','like','Partners%')->delete();*/
    }
}
