<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsgroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isgroupUsers', function (Blueprint $table) {
            $table->id();
            $table->string('imie',100);
            $table->string('nazwisko',100);
            $table->string('foto',100);
            $table->integer('ocena');
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
        Schema::dropIfExists('isgroupUsers');
    }
}
