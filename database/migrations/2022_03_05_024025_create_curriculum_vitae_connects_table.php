<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumVitaeConnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitae_connects', function (Blueprint $table) {
            $table->id();
            $table->biginteger('employer_id');
            $table->biginteger('cv_id');
            $table->tinyinteger('status')->default(0);
            $table->timestamps();
        });
        Schema::table('curriculum_vitaes', function(Blueprint $table)
        {
            $table->tinyinteger('cv_lock')->after('status')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_vitae_connects');
        Schema::table('curriculum_vitaes', function(Blueprint $table)
        {
            // delete above columns
            $table->dropColumn('cv_lock');
        });
    }
}
