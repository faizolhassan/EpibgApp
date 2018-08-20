<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpibgCommitteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epibg_committee', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            //$table->string('image_path');
            $table->string('work_occupation')->nullable();
            $table->string('pibg_position')->nullable();
            $table->string('email')->nullable();
            $table->string('biodata')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('epibg_committee');
    }
}
