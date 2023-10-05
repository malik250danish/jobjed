<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCurriculamViteaFullImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curriculum_vitaes', function(Blueprint $table)
        {
            $table->string('full_pic')->after('pic')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curriculum_vitaes', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('full_pic');
        });
    }
}
