<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->string('Nom_tache');

            $table->string('Date_debut');

            $table->string('Date_echeance');

            $table->string('type');

            $table->string('Jalon')->nullable()->default("NULL");

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('project_id')->unsigned()->nullable();
            $table->foreign('project_id')
                    ->references('id')
                    ->on('projects')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->string('value')->nullable()->default("On Hold");
                    
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
