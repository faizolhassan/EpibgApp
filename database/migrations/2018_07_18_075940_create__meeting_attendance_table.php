<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_meeting_attendance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client')->nullable();
            $table->string('name')->nullable();
            $table->string('sonname')->nullable();
            $table->string('email')->nullable();
            $table->string('teacher')->nullable();
            $table->date('time')->nullable();
            $table->date('date')->nullable();
            $table->string('with_partner')->nullable();
            $table->string('detail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_meeting_attendance');
    }
}
