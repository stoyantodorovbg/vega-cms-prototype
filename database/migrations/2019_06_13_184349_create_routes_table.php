<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->unique();
            $table->string('method')->default('get');
            $table->string('action')->unique();
            $table->string('name')->unique();
            $table->string('route_type')->default('web');
//            $table->string('action_type')->default('Front/');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
}
