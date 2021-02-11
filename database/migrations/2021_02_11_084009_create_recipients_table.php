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
            $table->foreign('recipient_id')->references('id')->on('users')->onCascade('delete')->nullable();
            $table->foreign('message_id')->references('id')->on('messages')->onCascade('delete')->nullable();
            $table->foreign('recipient_classroom')->references('classroom_id')->on('classroom_user')->onCascade('delete')->nullable();
            $table->foreign('recipient_school')->references('school_id')->on('school_user')->onCascade('delete')->nullable();
            $table->foreign('recipient_pas')->references('pas_id')->on('pas_user')->onCascade('delete')->nullable();
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
