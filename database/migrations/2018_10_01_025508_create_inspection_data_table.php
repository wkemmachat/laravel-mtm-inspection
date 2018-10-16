<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('size');
            $table->string('hydro_or_expand');
            $table->string('factory_name');
            $table->date('retest_date');
            $table->string('manu_month_year');
            $table->string('serial_number');
            $table->string('manufacturer_name');
            $table->string('pass_or_not');
            $table->string('volumn1')->nullable();
            $table->string('volumn2')->nullable();
            // $table->unsignedInteger('views')->default(0);
            // $table->unsignedInteger('answers')->default(0);
            // $table->integer('votes')->default(0);
            // $table->unsignedInteger('best_answer_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspections');
    }
}
