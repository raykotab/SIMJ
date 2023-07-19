<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('event_types', function (Blueprint $table) {
            $table->increments('event_type_id');
            $table->string('name');
            $table->unsignedInteger('event_id');
            $table->foreign('event_id')->references('event_id')->on('events');
            $table->string('background');
            $table->string('border');
            $table->string('text_color');
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
        Schema::dropIfExists('event_types');
    }
};
