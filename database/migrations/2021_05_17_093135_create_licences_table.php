<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicencesTable extends Migration
{

    public function up()
    {
        Schema::create('licences', function (Blueprint $table) {
            $table->id();

            $table->string('Nom_licence');

            $table->string('Date_achat');

            $table->string('Date_expir');

            $table->string('Code_licence');

            $table->string('type');

            $table->foreignId('client_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('set null');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
