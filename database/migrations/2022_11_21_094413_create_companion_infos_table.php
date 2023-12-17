<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companion_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('guest_req_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->tinyInteger('gender');
            $table->integer('birth_place');
            $table->integer('residency_country');
            $table->string('passport_no');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->integer('issue_place');
            $table->date('arrival_date');
            $table->string('profession')->nullable();
            $table->string('organization')->nullable();
            $table->integer('visa_duration');
            $table->tinyInteger('visa_status');
            $table->timestamps();

            $table->foreign('guest_req_id')->references('id')->on('guest_reqs');
            $table->foreign('birth_place')->references('id')->on('country');
            $table->foreign('residency_country')->references('id')->on('country');
            $table->foreign('issue_place')->references('id')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companion_infos');
    }
}
