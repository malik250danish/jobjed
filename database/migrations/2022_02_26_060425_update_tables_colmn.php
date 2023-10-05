<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesColmn extends Migration
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
            $table->string('pic')->after('last_name')->nullable();
            $table->string('gender')->after('pic')->nullable();

        });
        Schema::table('curriculum_vitaes', function(Blueprint $table)
        {
            $table->string('user_id')->after('id')->nullable();

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
            $table->dropColumn('pic');
            $table->dropColumn('gender');
        });
        Schema::table('curriculum_vitaes', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('user_id');
        });
    }
}
