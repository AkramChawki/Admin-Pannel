<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();

            $table->string('Nom_reminder');

            $table->string('Date_debut');

            $table->string('Date_echeance');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('value')->nullable()->default("On Hold");
            
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
