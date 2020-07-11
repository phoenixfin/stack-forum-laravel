<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->timestamp('date_modified', 0);
            $table->time('date_created', 0)->default(0);
            $table->string('title');
            $table->string('content');
            $table->string('slug')->storedAs("lower(replace(title,' ','-'))");
            $table->string('tags')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('upvote_count')->default(0);
            $table->unsignedBigInteger('downvote_count')->default(0);            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
