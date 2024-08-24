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
        Schema::create('voters', function (Blueprint $table) {
            $table->increments('id');
            // nim
            $table->string('student_id', 30);
            $table->string('password', 30);
            // nama
            $table->string('name', 30);
            // jurusan
            $table->string('major', 60);
            // program studi
            $table->string('study', 60);
            // angkatan
            $table->string('generation', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
