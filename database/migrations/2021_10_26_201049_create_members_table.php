<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('id');
            $table->string('code')->nullable();
            $table->string('cooperative')->nullable();
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->date('date_naissance')->nullable();
            $table->string('lieu')->nullable();
            $table->string('situation_mat')->nullable();
            $table->string('civilite')->nullable();
            $table->string('police_a')->nullable();
            $table->string('type_p')->nullable();
            $table->string('numero_p')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('adresse')->nullable();
            $table->string('email')->unique();
            $table->string('interlocuteur')->nullable();
            $table->integer('tel_interlocuteur')->nullable();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');    
            $table->string('profile_photo_path', 2048)->default('avatar.png');
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
        Schema::dropIfExists('members');
    }
}
