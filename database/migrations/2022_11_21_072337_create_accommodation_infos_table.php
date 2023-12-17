<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodation_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('guest_req_id');
            $table->tinyInteger('type');
            $table->date('checkin');
            $table->date('checkout');
            $table->tinyInteger('roomtype');
            $table->timestamps();

            $table->foreign('guest_req_id')->references('id')->on('guest_reqs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodation_infos');
    }
}
