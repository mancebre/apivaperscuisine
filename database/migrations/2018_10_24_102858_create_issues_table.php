<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text');
//			$table->string('reportBack')->unique(); // If we want to notify user when issue is sorted.
            $table->string('reportBack'); // db:seed on MariaDB must go with this line
            $table->integer('user_id')->nullable(); //User who created bug report
            $table->boolean(('resolved'));
            $table->integer('group_id')->unsigned(); // If we want to group issues someday...
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
        Schema::dropIfExists('issues');
    }
}
