<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(1);
            $table->string('semantic_tag');
            $table->integer('row_position');
            $table->integer('col_position');
            $table->smallInteger('col_width');
            $table->string('classes');
            $table->json('title')->nullable();
            $table->json('summary')->nullable();
            $table->json('body')->nullable();
            $table->json('styles')->nullable();
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
        Schema::dropIfExists('containers');
    }
}
