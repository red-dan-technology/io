<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FingerPrintEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finger_print_events', function (Blueprint $table) {
            $table->string('token', 100)->primary();
            $table->string('types', 20); //capture //verification //reader
            $table->string('statustemplate', 150)->nullable();
            $table->binary('fingerprint')->nullable();
            $table->binary('photo')->nullable();
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
        Schema::dropIfExists('finger_print_events');
    }
}