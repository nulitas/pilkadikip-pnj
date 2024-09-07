<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('position_id');
            $table->string('name', 150);
            $table->string('photo', 150);
            // jurusan
            $table->string('major', 150);
            // program studi
            $table->string('study', 150);
            // angkatan
            $table->string('generation', 20);

            $table->text('vision', 150);
            $table->text('mission', 150);
            $table->text('link', 100);

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
