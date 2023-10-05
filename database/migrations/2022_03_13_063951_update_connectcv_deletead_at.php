<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectcvDeleteadAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curriculum_vitae_connects', function(Blueprint $table)
        {
            $table->string('is_deleted')->after('status')->default(0)->nullable();
            $table->timestamp('deleted_at')->after('is_deleted')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curriculum_vitae_connects', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('is_deleted');
            $table->dropColumn('deleted_at');
        });
    }
}
