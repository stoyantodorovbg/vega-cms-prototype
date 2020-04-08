<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('url');
            $table->tinyInteger('col_width');
            $table->boolean('status')->default(1);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('outer_row_classes')->nullable();
            $table->string('inner_row_classes')->nullable();
            $table->string('classes')->nullable();
            $table->json('styles')->nullable();
            $table->json('meta_tags')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
