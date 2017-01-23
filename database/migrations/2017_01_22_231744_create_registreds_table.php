<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registreds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('name');
            $table->string('email');
            $table->string('gender');
            $table->string('usergroup');
            $table->string('address');
            $table->string('age');
            $table->string('newsletters');
            $table->string('duration');
            $table->text('note');
            $table->string('hobby');
            $table->text('bank');
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
        Schema::drop('registreds');
    }
}
