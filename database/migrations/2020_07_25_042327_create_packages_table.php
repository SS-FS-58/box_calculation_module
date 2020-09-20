<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('boxType')->nullable();
            $table->string('packageType')->nullable();
            $table->double('productSize1')->nullable();
            $table->double('productSize2')->nullable();
            $table->double('productSize3')->nullable();
            $table->double('tripodSize1')->nullable();
            $table->double('tripodSize2')->nullable();
            $table->double('bracket')->nullable();
            $table->double('piercing')->nullable();
            $table->double('colorRing')->nullable();
            $table->double('printQuantity1')->nullable();
            $table->double('printQuantity2')->nullable();

            $table->double('material1')->nullable();
            $table->double('material2')->nullable();
            

            $table->double('printColor1')->nullable();
            $table->double('printColor2')->nullable();
            
            $table->double('printsBook')->nullable();
            $table->double('thickness')->nullable();
            $table->string('corrugatedBoard')->nullable();
            
            $table->boolean('Formedabox')->default(false);
            $table->boolean('Lamination')->default(false);
            $table->string('selLamination1')->nullable();
            $table->string('selLamination2')->nullable();
            $table->boolean('HandRope')->default(false);
            $table->string('selHandRope')->nullable();
            $table->boolean('Handle')->default(false);
            $table->boolean('StampingSliver')->default(false);
            $table->double('StampingSliverL')->nullable();
            $table->double('StampingSliverW')->nullable();
            $table->boolean('StampingGold')->default(false);
            $table->double('StampingGoldL')->nullable();
            $table->double('StampingGoldW')->nullable();
            $table->boolean('PVCWindows')->default(false);
            $table->double('PVCWindowsL')->nullable();
            $table->double('PVCWindowsW')->nullable();
            $table->boolean('Embossed')->default(false);
            $table->double('EmbossedL')->nullable();
            $table->double('EmbossedW')->nullable();
            $table->boolean('SpotUV')->default(false);
            $table->string('selSpotUV1')->nullable();
            $table->double('SpotUVL')->nullable();
            $table->double('SpotUVW')->nullable();
            $table->boolean('Varnishing')->default(false);

            $table->double('selText')->nullable();
            $table->boolean('outerPrinting')->default(false);
            $table->double('outerMaterial1')->nullable();
            $table->double('outerMaterial2')->nullable();
            $table->double('outerPrintingcolor1')->nullable();

            $table->boolean('innerPrinting')->default(false);
            $table->double('innerMaterial1')->nullable();
            $table->double('innerMaterial2')->nullable();
            $table->double('innerPrintingcolor1')->nullable();

            $table->string('selVarnishing')->nullable();

            $table->boolean('LinenTexture')->default(false);
            $table->boolean('Indentation')->default(false);
            $table->string('selIndentation1')->nullable();
            $table->string('selIndentation2')->nullable();
            $table->boolean('Easytearline')->default(false);
            $table->string('selEasytearline')->nullable();
            $table->boolean('Code')->default(false);
            $table->string('selCode1')->nullable();
            $table->string('selCode2')->nullable();
            $table->boolean('PunchHole')->default(false);
            $table->string('selPunchHole')->nullable();
            $table->string('selSpotUV2')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
