<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exams', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('email');
        $table->string('country');
        $table->string('phone')->nullable();
        $table->string('temp_token', 60)->nullable();
        $table->json('exam_answers')->nullable();
        $table->unsignedTinyInteger('attemps')->nullable();
        $table->boolean('approved')->nullable();
        $table->unsignedTinyInteger('results')->nullable();
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
        Schema::dropIfExists('exams');
    }
}
