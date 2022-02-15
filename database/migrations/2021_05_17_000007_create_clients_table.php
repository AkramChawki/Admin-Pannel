<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('Intitule')->nullable();

            $table->string('Abrege')->nullable();

            $table->string('Compte_collectif')->nullable();

            $table->string('Interlocuteur')->nullable();

            $table->string('Adresse')->nullable();

            $table->string('Code_postal')->nullable();

            $table->string('Ville')->nullable();

            $table->string('Region')->nullable();

            $table->string('Pays')->nullable();

            $table->string('Telephone')->nullable();

            $table->string('Email')->nullable();

            $table->string('Site_web')->nullable();

            $table->string('SIRET')->nullable();

            $table->string('Code_NAF')->nullable();
            
            $table->string('ID_TVA')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
