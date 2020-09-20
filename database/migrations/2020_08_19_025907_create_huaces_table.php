<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huaces', function (Blueprint $table) {
            $table->id();
            $table->integer('productSize1');
            $table->integer('productSize2');
            $table->integer('expandedSize1');
            $table->integer('expandedSize2');
            $table->integer('printsBook');
            $table->string('status')->default('progress');
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
        Schema::dropIfExists('huaces');
    }
}
