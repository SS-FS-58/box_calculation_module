<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolySetting;

class BackdeskSettingsController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function postPaperBox(Request $request){
        $input = $request->all();
        PolySetting::query()->truncate();
        PolySetting::create($input);
        $data = PolySetting::latest()->first();
        return view('poly' ,['data'=>$data]);    

    }
}
