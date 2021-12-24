<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantations', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->date('date');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('lieu');
            $table->foreignId('member_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('plantation_speculation', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('speculation_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('plantation_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantations');
    }
}
