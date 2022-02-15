<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('user_project', function (Blueprint $table) {
            $table->unsignedInteger('project_id');

            $table->foreign('project_id', 'project_id_fk_466031')->references('id')->on('projects')->onDelete('cascade');

            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'users_id_fk_466031')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
