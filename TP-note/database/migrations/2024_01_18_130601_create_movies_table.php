<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->text('login');
			$table->text('title');
			$table->enum('type', ['movie', 'tvshow']);
			$table->text('realisator');
			$table->date('date');
			$table->text('synopsis');


			$table->foreign('login')->references('login')->on('myusers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
