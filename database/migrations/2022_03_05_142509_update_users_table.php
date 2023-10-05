<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->biginteger('role_id')->after('id')->default(3);
            $table->biginteger('nid')->after('gender')->nullable();
            $table->biginteger('passport')->after('nid')->nullable();
            $table->biginteger('phone')->after('passport')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('role_id');
            $table->dropColumn('nid');
            $table->dropColumn('phone');
            $table->dropColumn('passport');
        });
    }
}
