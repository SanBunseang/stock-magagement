<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name',50)->nullable();
            $table->string('Gender',10)->nullable();
            $table->date('DOB')->nullable();
            $table->string('Position',50)->nullable();
            $table->string('Address',255)->nullable();
            $table->string('Phone',20)->nullable();
            $table->string('Email',50)->nullable();
            $table->date('HiredDate')->nullable();
            $table->string('Salary')->nullable();
            $table->string('Image')->nullable();
            $table->string('Status');
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
        Schema::dropIfExists('tb_staff');
    }
}
