<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolySetting extends Model
{
    //
    protected $fillable = [
        "priceLd",
        "priceHd",
        "printingFee1",
        "printingFee2",
        "printingFee3",
        "printingFee4",
        "printingFee5",
        "printigCur1",
        "printigCur2",
        "printigCur3",
        "printigCur4",
        "printigCur5",
        "taxPoint",
        "profit",
        "usdCur",
        "euroCur",
        "poundCur",
    ];
}
