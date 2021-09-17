<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_id')->constrained('reports')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('condition_id')->constrained('conditions')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_conditions');
    }
}
