<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('phone')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('region')->nullable();
            $table->string('departement')->nullable();
            $table->string('ville')->nullable();
            $table->integer('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('user_id')->index();
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
        Schema::dropIfExists('profiles');
    }
}
