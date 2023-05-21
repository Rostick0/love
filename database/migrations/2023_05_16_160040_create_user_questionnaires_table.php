<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_questionnaires', function (Blueprint $table) {
            $table->id();
            $table->year('birth_year_min')->nullable();
            $table->year('birth_year_max')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_man')->nullable();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_questionnaires');
    }
}
