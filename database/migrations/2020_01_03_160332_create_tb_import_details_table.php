<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbImportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_import_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ProductId')->unsigned();
            $table->string('ImportQty')->nullable();
            $table->double('UnitPrice')->nullable();
            $table->double('Amount')->nullable();
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
        Schema::dropIfExists('tb_import_details');
    }
}
