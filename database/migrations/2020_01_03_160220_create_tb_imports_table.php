<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_imports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('SupplierId');
            $table->integer('StaffId');
            $table->string('StaffName',50)->nullable();
            $table->date('Date')->nullable();
            $table->string('TotalAmount')->nullable();
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
        Schema::dropIfExists('tb_imports');
    }
}
