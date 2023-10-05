<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColmnCvHeightAndWeightIn extends Migration
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
            $table->string('height_in')->after('height')->default('ft');
            $table->string('weight_in')->after('weight')->default('kg');

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
            $table->dropColumn('height_in');
            $table->dropColumn('weight_in');
        });
    }
}
