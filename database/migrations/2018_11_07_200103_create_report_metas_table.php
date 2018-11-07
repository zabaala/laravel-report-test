<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meta_id');
            $table->unsignedInteger('report_id');
            $table->timestamps();

            $table->foreign('meta_id')->references('id')->on('metas')->onDelete('cascade');
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_metas');
    }
}
