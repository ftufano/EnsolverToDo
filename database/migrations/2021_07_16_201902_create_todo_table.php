<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('users_id');
            $table->unsignedInteger('folder_id')->nullable();

            $table->index('users_id','fk_todo_users1_idx');
		    $table->index('folder_id','fk_todo_folder1_idx');
		
		    $table->foreign('users_id')
		        ->references('id')->on('users');
		
		    $table->foreign('folder_id')
		        ->references('id')->on('folder');

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
        Schema::dropIfExists('todo');
    }
}
