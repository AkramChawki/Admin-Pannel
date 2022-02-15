<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('Nom_projet')->nullable();

            $table->string('Societe')->nullable();

            $table->string('Responsable')->nullable();

            $table->string('Date_debut')->nullable();

            $table->string('Date_echeance')->nullable();

            $table->foreignId('client_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
