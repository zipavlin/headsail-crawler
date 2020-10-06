<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('utility')->nullable();
            $table->json('variant')->nullable();
            $table->foreignId('node_id');
            $table->foreign('node_id')->references('id')->on('nodes')->cascadeOnDelete();
            $table->boolean('is_tailwind')->virtualAs('IF(utility IS NULL, 0, 1)');
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
        Schema::dropIfExists('classes');
    }
}
