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
        Schema::create('diacritics', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->string("symbol", 10);
            $table->string("type", 50);
            $table->string("latin_translit", 50)->nullable();
            $table->string("example");
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
        Schema::dropIfExists('diacritics');
    }
};
