<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreerCompteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptes', function (Blueprint $table)  {
            $table->bigIncrements('id');
            $table->integer('codeBanq');
            $table->integer('codeGuichet');
            $table->integer('rib');
            $table->integer('clerib');
            $table->BigInteger('titulaire');
            $table->foreign('titulaire')->references('id')->on('clients');
            $table->integer('solde');
            $table->string('devise',3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptes');
    }
}
