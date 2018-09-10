<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeFlavorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_flavors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id');
            $table->string('name');
            $table->integer('amount');
            $table->integer('percentage');
            $table->string('type');
            $table->integer('grams');
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
        Schema::dropIfExists('recipe_flavors');
    }
}
