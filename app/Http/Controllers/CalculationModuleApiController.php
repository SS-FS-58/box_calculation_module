<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;


class CalculationModuleApiController extends Controller
{
    //
    public function getTest(Request $request){
        $return['topics'] = "topic";
        $return['reportReasons'] = "reportReasons";
        return response()->json($return, 200);
    }
}
