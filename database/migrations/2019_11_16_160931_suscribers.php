<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Suscribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suscribers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('email', 200)->nullable();
          $table->string('name', 250)->nullable();
          $table->integer('times')->nullable();      
          $table->unsignedSmallInteger('click')->nullable();
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
        Schema::table('suscribers', function (Blueprint $table) {
            //
        });
    }
}
