<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipient_id');
            $table->unsignedBigInteger('message_id');
            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('pas_id');
            $table->float('is_read');
            $table->timestamps();
			
			$table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade')->nullable();
			$table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade')->nullable();
			$table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade')->nullable();
			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade')->nullable();
			$table->foreign('pas_id')->references('id')->on('pas')->onDelete('cascade')->nullable();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipients');
    }
}
