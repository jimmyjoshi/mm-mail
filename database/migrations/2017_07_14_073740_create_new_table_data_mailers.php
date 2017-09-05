<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTableDataMailers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mailers', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id');
            $table->Integer('subscriber_id');
            $table->Integer('template_id');
            $table->tinyInteger('send_status')->default(0);
            $table->dateTime('schedule_time');
            $table->dateTime('send_at')->nullable();
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
        Schema::dropIfExists('data_mailers');
    }
}
