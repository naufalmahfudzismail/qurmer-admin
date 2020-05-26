<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('badge_id')->unsigned();
            $table->string('nama');
            $table->string('urutan');
            $table->integer('jumlah_ayat');
            $table->integer('basic_score')->nullable();
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
        Schema::dropIfExists('surahs');
    }
}
