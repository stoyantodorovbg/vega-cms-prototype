<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentContainerChildContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_container_child_container', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_container_id');
            $table->unsignedBigInteger('child_container_id');

            $table->foreign('parent_container_id')
                ->references('id')
                ->on('containers');
            $table->foreign('child_container_id')
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
        Schema::dropIfExists('parent_container_child_container');
    }
}
