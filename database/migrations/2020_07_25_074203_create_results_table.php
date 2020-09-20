<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->integer('full_amount_1000');
            $table->integer('tax_included_1000');
            $table->integer('full_amount_2000');
            $table->integer('tax_included_2000');
            $table->integer('full_amount_3000');
            $table->integer('tax_included_3000');
            $table->integer('full_amount_4000');
            $table->integer('tax_included_4000');
            $table->integer('full_amount_5000');
            $table->integer('tax_included_5000');
            $table->text('description');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
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
        Schema::dropIfExists('results');
    }
}
