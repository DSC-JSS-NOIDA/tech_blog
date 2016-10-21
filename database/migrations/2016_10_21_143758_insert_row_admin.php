<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRowAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
                'name'=>'admin1',
                'email'=>'admin1@a.a',
                'password'=>'$2y$10$AWBT//F.Hpf5g0kPlFDSoOwSl/BdkRsq0HhFNVfvsWSOIfJ1Ehs7O',
                'admin'=>'1'
            ]
        );
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
