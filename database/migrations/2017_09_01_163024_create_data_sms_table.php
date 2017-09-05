<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sms', function (Blueprint $table)
        {
            $table->increments('id');
            $table->Integer('user_id');
            $table->Integer('subscriber_id');
            $table->string('message', 255);
            $table->Integer('status')->default(0);
            $table->Integer('send_status')->default(0);
            $table->datetime('schedule_time')->nullable();
            $table->datetime('send_at')->nullable();
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
        //
    }
}
