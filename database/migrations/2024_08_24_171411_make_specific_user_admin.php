<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class MakeSpecificUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')
            ->where('email', 'elconquistadorbaoulyn@gmail.com')
            ->update(['is_admin' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')
            ->where('email', 'elconquistadorbaoulyn@gmail.com')
            ->update(['is_admin' => 0]);
    }
}
