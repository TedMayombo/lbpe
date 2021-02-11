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
			
			
			
			$table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade')->nullable();
			$table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade')->nullable();
			$table->foreign('classroom_id')->references('classroom_id')->on('classroom_user')->onDelete('cascade')->nullable();
			$table->foreign('school_id')->references('school_id')->on('school_user')->onDelete('cascade')->nullable();
			$table->foreign('pas_id')->references('pas_id')->on('pas_user')->onDelete('cascade')->nullable();
			
			
            //$table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            //$table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade')->nullable();
            //$table->foreign('recipient_classroom')->references('classroom_id')->on('classroom_user')->onDelete('cascade')->nullable();
            //$table->foreign('recipient_school')->references('school_id')->on('school_user')->onDelete('cascade')->nullable();
            //$table->foreign('recipient_pas')->references('pas_id')->on('pas_user')->onDelete('cascade')->nullable();
            $table->float('is_read');
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
        Schema::dropIfExists('recipients');
    }
}
