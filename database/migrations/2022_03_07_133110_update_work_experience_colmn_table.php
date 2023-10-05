<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWorkExperienceColmnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('curriculum_vitae_work_experience', function(Blueprint $table)
        {
            $table->string('work')->after('work_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curriculum_vitae_work_experience', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('work');
        });
    }
}
