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
            $table->bigIncrements('id');
            $table->string ( 'user_name' , 169 );
            $table->string ( 'email' , 169 );
            $table->string ( 'homepage' , 169 );
            $table->string ( 'message' , 169 );
            $table->string ( 'user_ip_address' , 169 );
            $table->string ( 'user_browser' , 169 );

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
        Schema::dropIfExists('messages');
    }
}
