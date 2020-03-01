<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_container', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('container_id');

            $table->foreign('page_id')
                ->references('id')
                ->on('pages');
            $table->foreign('container_id')
                ->references('id')
                ->on('containers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page_container');
    }
}
