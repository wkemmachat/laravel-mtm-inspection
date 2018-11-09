<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dots', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('serial_number');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('user_key_fg_id')->nullable();
            $table->dateTime('fg_date')->nullable();
            $table->dateTime('weld_date');
            $table->decimal('tare_weight', 6, 2);
            $table->integer('customer_id');
            $table->string('top');
            $table->string('bottom');
            $table->string('spud');
            $table->string('collar');
            $table->string('footring');
            $table->string('circle');
            $table->string('longitudinal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dots');
    }
}
