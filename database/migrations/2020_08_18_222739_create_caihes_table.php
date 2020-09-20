<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaihesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caihes', function (Blueprint $table) {
            $table->id();
            $table->string('package_type');
            $table->integer('product_size1');
            $table->integer('product_size2');
            $table->integer('product_size3');
            $table->integer('quantity1');
            $table->integer('quantity2');
            $table->string('Material1');
            $table->integer('Material2');
            $table->string('face_paper_color');
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
        Schema::dropIfExists('caihes');
    }
}
