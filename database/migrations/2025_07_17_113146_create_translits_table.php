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
    public function up()
    {
        Schema::create('translits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aksara_batak_id')->constrained();
            $table->string('dialect', 50);
            $table->string('latin_translit',50);
            $table->string('example');
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
        Schema::dropIfExists('translits');
    }
};
