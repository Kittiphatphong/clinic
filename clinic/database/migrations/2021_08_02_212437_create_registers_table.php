<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time_service')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('userR_id')->nullable();
            $table->unsignedBigInteger('userB_id')->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('userR_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('userB_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
