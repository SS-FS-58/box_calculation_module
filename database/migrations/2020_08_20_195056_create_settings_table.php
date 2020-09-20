<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('boxType');
            $table->double('perSquare');
            $table->double('printingFee1');
            $table->string('printigCur1');
            $table->double('printingFee2');
            $table->string('printigCur2');
            $table->double('printingFee3');
            $table->string('printigCur3');
            $table->double('printingFee4');
            $table->string('printigCur4');
            $table->double('printingFee5');
            $table->string('printigCur5');
            $table->double('packageCost', 8, 5);
            $table->double('shippingCost', 8, 5);
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
        Schema::dropIfExists('settings');
    }
}
