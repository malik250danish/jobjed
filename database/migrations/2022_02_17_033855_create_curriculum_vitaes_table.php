<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumVitaesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_vitaes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255)->nullable();
            $table->string('email',255)->nullable();
            $table->bigInteger('phone')->unsigned();
            $table->text('home_address')->nullable();
            $table->string('religion',50)->nullable();
            $table->text('place_birth')->nullable();
            $table->Integer('national_country_id')->nullable();
            $table->Integer('occupation_id')->nullable();
            $table->tinyinteger('martial_stauts_id')->nullable();
            $table->tinyinteger('children')->nullable();
            $table->date('dob')->nullable();
            $table->Integer('age')->nullable();
            $table->double('height',11,2)->nullable();
            $table->double('weight',11,2)->nullable();
            $table->string('complexion',255)->nullable();
            $table->text('educational_background')->nullable();
            $table->text('other_info')->nullable();
            $table->double('monthly_salary',11,2)->nullable();
            $table->Integer('contract_period')->nullable()->comment('Contract in Years');
            $table->string('passport_number',255)->nullable();
            $table->text('cv')->nullable();
            $table->tinyinteger('status')->default(1);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('curriculum_vitae_previous_work', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curriculum_vitae_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->Integer('contract_period')->nullable()->comment('Contract in Years');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('curriculum_vitae_work_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curriculum_vitae_id')->nullable();
            $table->integer('work_id')->nullable();
            $table->tinyinteger('work_status')->nullable()->comment('0 = flase,1 = true');
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        Schema::create('language_grip', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curriculum_vitae_id')->nullable();
            $table->integer('language_id')->nullable();
            $table->tinyinteger('fluent')->default(0);
            $table->tinyinteger('fair')->default(0);
            $table->tinyinteger('poor')->default(0);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculum_vitaes');
        Schema::dropIfExists('language_grip');
        Schema::dropIfExists('curriculum_vitae_previous_work');
        Schema::dropIfExists('curriculum_vitae_work_experience');
    }
}
