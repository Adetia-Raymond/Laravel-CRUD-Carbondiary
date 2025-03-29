<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmissionRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('emission_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transport');
            $table->string('fuel_type')->nullable();
            $table->float('distance');
            $table->float('emission'); 
            $table->float('trees');    
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('emission_records');
    }
}

