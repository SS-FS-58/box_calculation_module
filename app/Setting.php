<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable = [
        'boxType','perSquare','printingFee1','printigCur1','printingFee2','printigCur2','printingFee3','printigCur3','printingFee4','printigCur4','printingFee5','printigCur5','packageCost','shippingCost'
    ];
}
