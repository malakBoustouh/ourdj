<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsspecialistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carsspecialistes', function (Blueprint $table) {
            $table->bigIncrements('id_carsspecialiste');
            $table->string('nom');
            $table->string('prenom');
            $table->Date('dateNaissance');
            $table->string('email')->unique();
            $table->string('motpass');
            $table->string('numTel');
            $table->string('address');
            $table->string('specialite');
            $table->string('image');
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
        Schema::dropIfExists('carsspecialistes');
    }
}
