<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('chat_id');
            $table->unsignedInteger('sent_to');
            $table->unsignedInteger('sent_from');
            $table->string('title');
            $table->longText('body');
            $table->timestamp('undread', 0)->nullable();
            $table->timestamps();

            $table->foreign('sent_to')->references('id')->on('users');
            $table->foreign('sent_from')->references('id')->on('users');
            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
