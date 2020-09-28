<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\BubbleSetting;
use App\PolySetting;
use Carbon\Carbon;
use App\Result;
class HomeController extends Controller
{
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
    public function index()
    {
        return view('home');
    }

    public function storePackage(Request $request){
        $data['package_type'] = $request->get('package_type');
        $data['product_size1'] = $request->get('product_size1');
        $data['product_size2'] = $request->get('product_size2');
        $data['product_size3'] = $request->get('product_size3');
        $data['print_quantity1'] = $request->get('print_quantity1');
        $data['print_quantity2'] = $request->get('print_quantity2');
        $data['facial_paper1'] = $request->get('facial_paper1');
        $data['facial_paper2'] = $request->get('facial_paper2');
        $data['face_paper_color'] = $request->get('face_paper_color');
        $data['contents_face1'] = $request->get('contents_face1');
        $data['contents_face2'] = $request->get('contents_face2');
        $data['corrugated_material'] = $request->get('corrugated_material');
        $package_id = Package::create($data)->id;
        $type="package";
        $this->delay($package_id,$type);
        $flag = Package::select('status')->where('id',$package_id)->first()->status;
        if( $flag == 'update')  {
            $result =  Result::where('package_id',$package_id)->get();
        }           
        else{
            $result = 'failed';
        }
            
        return response()->json(['result' => $result]);
    }

    public function delay($package_id){
        usleep (10000);
        
        $package_data = Package::select('status')->where('id',$package_id)->first();        
        file_put_contents('123.txt',$package_data->status);       
        if($package_data->status == 'update'){
            return $package_data->status;
        } else if($package_data->status == 'Error'){
            return $package_data->status;
        } else{
            $this->delay($package_id);
        }
    }

    public function showCaihe(){
        return view('caihe');
    }

    public function storeCaihe(Request $request){
        
        $data = $request->all();
        $data['boxType'] = 'Paper Box';
        $caihe_id = Package::create($data)->id;
        $this->delay($caihe_id);
        $flag = Package::select('status')->where('id',$caihe_id)->first()->status;
        if( $flag == 'update')  {
            $result =  Result::where('package_id',$caihe_id)->get();
        }           
        else{
            $result = 'failed';
        }
            
        return response()->json(['result' => $result]);
    }

    public function showHuace(){
        return view('huace');
    }

    public function  storeHuace(Request $request){
        $data['boxType']='sampleAlbum';
        $data['productSize1'] = $request->get('productSize1');
        $data['productSize2'] = $request->get('productSize2');
        $data['printQuantity1'] = $request->get('printQuantity1');
        $data['printQuantity2'] = $request->get('printQuantity2');
        $data['printsBook'] = $request->get('printsBook');
       
        $huace_id = Package::create($data)->id;
        $this->delay($huace_id);
        $flag = Package::select('status')->where('id',$huace_id)->first()->status;
        // file_put_contents('234.txt',$flag);
        if( $flag == 'update')  {
            $result =  Result::where('package_id',$huace_id)->get();
        }           
        else{
            $result = 'failed';
        }
            
        return response()->json(['result' => $result]);
    }

    public function showDiaopai(){
        return view('diaopai');
    }

    public function storeDiaopai(Request $request){
        $data = $request->all();
        $data['boxType']='Tag';
        
        $tag_id =  Package::create($data)->id;
        $this->delay($tag_id);
        $flag = Package::select('status')->where('id',$tag_id)->first()->status;

        if( $flag == 'update')  {
            $result =  Result::where('package_id',$tag_id)->get();
        }           
        else{
            $result = 'failed';
        }
            
        return response()->json(['result' => $result]);
    }

    public function showTaili(){
        return view('taili');
    }

    public function storeTaili(Request $request){
        $data = $request->all();
        $data['boxType']='Desk calendar';
        
        $taili_id = Package::create($data)->id;
        $this->delay($taili_id);
        $flag = Package::select('status')->where('id',$taili_id)->first()->status;

        if( $flag == 'update')  {
            $result =  Result::where('package_id',$taili_id)->get();
        }           
        else{
            $result = 'failed';
        }
            
        return response()->json(['result' => $result]);
    }

    public function adminDashboard(){
        return view('admin');
    }

    public function showBubble(){
        $data = BubbleSetting::latest()->first();
        return view('bubble',['data'=>$data]);
    }

    public function showPoly(){
        $data = PolySetting::latest()->first();
        return view('poly' ,['data'=>$data]);
    }

    public function showPaperbox(){
        $data = PolySetting::latest()->first();
        return view('paperbox' ,['data'=>$data]);
    }
    
    public function showMailerbox(){
        $data = PolySetting::latest()->first();
        return view('mailerbox' ,['data'=>$data]);
    }
    public function showShippingbox(){
        $data = PolySetting::latest()->first();
        return view('shippingbox' ,['data'=>$data]);
    }
    public function showRigidbox(){
        $data = PolySetting::latest()->first();
        return view('rigidbox' ,['data'=>$data]);
    }
    

    public function storeBubble(Request $request){
        $input = $request->all();
        BubbleSetting::query()->truncate();
        BubbleSetting::create($input);
        $data = BubbleSetting::latest()->first();
        return view('bubble',['data'=>$data]);

    }

    public function storePoly(Request $request){
        $input = $request->all();
        PolySetting::query()->truncate();
        PolySetting::create($input);
        $data = PolySetting::latest()->first();
        return view('poly' ,['data'=>$data]);

    }
    public function storePaperbox(Request $request){
        $fomula_txt = `<div class="formula-area col-6">
        <p style="font-size:1.2rem; font-weight:bold;">
        ----- CALCULATION FOMULA ----- <br><br>`;
        $input = $request->all();
        $L = intval($input['productSize1']);
        $W = intval($input['productSize2']);
        $H = intval($input['productSize3']);
        $quantity = intval($input['printQuantity1']);
        $material1 = $input['material1'];
        $material2 = intval($input['material2']);
        
        $gludeSize = intval($input['gluedSize']);
        $flapSize = intval($input['flapSize']);
        $bleedSize = intval($input['bleedSize']);
        $fixedSize = intval($input['fixedSize']); 

        $print1PaperSizeW = intval($input['print1PaperSizeW']);
        $print1PaperSizeH = intval($input['print1PaperSizeH']);
        $print2PaperSizeW = intval($input['print2PaperSizeW']);
        $print2PaperSizeH = intval($input['print2PaperSizeH']);
        
        $paperwastageNumber = intval($input['paperwastageNumber']);
        $paperCost = intval($input['paperCost']);

        // Printing setting parameters
        $pintingbelow3000 = $input['pintingbelow3000'];
        $printingper1000 = $input['printingper1000'];

        // Binding setting parameters
        $glossLamination = (float)$input['glossLamination'];
        $mattLamination = (float)$input['mattLamination'];
        $aqueousVarnishing = (float)$input['aqueousVarnishing'];
        $uvCoating = (float)$input['uvCoating'];
        $dieCut = (float)$input['dieCut'];
        $spotUV = (float)$input['spotUV'];
        $embossDebossed = (float)$input['embossDebossed'];
        $texturedEffect = (float)$input['texturedEffect'];
        $foilStamping = (float)$input['foilStamping'];

        //Binding User setting

        $glossLamination_C = $input['glossLamination_C'];
        $mattLamination_C = $input['mattLamination_C'];
        $aqueousVarnishing_C = $input['aqueousVarnishing_C'];
        $uvCoating_C = $input['uvCoating_C'];
        $dieCut_C = $input['dieCut_C'];
        $spotUV_C = $input['spotUV_C'];
        $embossDebossed_C = $input['embossDebossed_C'];
        $texturedEffect_C = $input['texturedEffect_C'];
        $foilStamping_C = $input['foilStamping_C'];

        $flat_size1 = ($L + $W) * 2 + $gludeSize + 2 * $bleedSize;
        $flat_size2 = ($H + $W + $W) + 2 * $flapSize + 2 * $bleedSize;

        $fomula_txt .='Die Cut Width (mm):  ('.$L.' + '.$W.') * 2 + '.$gludeSize.' + 2 * '.$bleedSize.' = '.$flat_size1.'<br>';
        $fomula_txt .='Die Cut Height(mm):  ('.$H.' + '.$W.' + '.$W.') + 2 * '.$flapSize.' + 2 * '.$bleedSize.' = '.$flat_size2.'<br>';
        
        // case 1: 889*658
        $fumula_maximum_txt = '';
        $printplatepapersize = [
            "0"=>[
                "0" => $print1PaperSizeW,
                "1" => $print1PaperSizeH
            ],
            "1" =>[
                "0" => $print2PaperSizeW,
                "1" => $print2PaperSizeH
            ]
            ];
        $max_case = 0;
        $max_number1 = 0;
        $max_number2 = 0;
        $max_criteria = $printplatepapersize["0"]["0"] * $printplatepapersize["0"]["1"];
        // case 11:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 1: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 1;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 1 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
            }
        // case 12:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size2 + $bleedSize));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size1 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 2: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 2;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 2 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 21:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 3: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 3;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 3 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 22:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size2));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size1)*$number2+$fixedSize + 2*$bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 4: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 4;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 4 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }

        
        if($max_number1 == 0 || $max_number2 == 0){
            $data = ["success"=>'false'];
            return response()->json($data);
        }else{
            $fomula_txt .= $fumula_maximum_txt;
            $paper_quantity = ceil($quantity / ($max_number1 * $max_number2));
            $fomula_txt .='Paper Quantity :  '.$quantity.' / '.($max_number1 * $max_number2).' = '. $paper_quantity;
            if ($quantity <= 5000){
                $paper_quantity += $paperwastageNumber;
                $fomula_txt .= ' + '.$paperwastageNumber.' = '.$paper_quantity;
            }
            $fomula_txt .='<br>';    
            if($max_case > 2) {
                $printpapersizeWidth = $printplatepapersize["1"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }else{
                $printpapersizeWidth = $printplatepapersize["0"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }
            $printpapersize = $max_criteria * ($max_number1 * $max_number2);
            $printpaperCost = intval($printpapersize / 1000000 * $paper_quantity * $paperCost *  $material2 / 1000);

            $fomula_txt .='Paper cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * '. $paperCost. ' * '.($material2 / 1000).' = '.$printpaperCost.'<br>';

            // Insert Printing price.
            $printingPrice = $pintingbelow3000;
            if($paper_quantity > 3000){
                $printingPrice += ceil(($paper_quantity-3000)/1000) * $printingper1000;
            }
            $fomula_txt .='Printing cost: '.$printingPrice.'<br>';
            // calculation total area
            $totalArea = floatval($printpapersize / 1000000 * $paper_quantity);
            $fomula_txt .='Total Area: '.$totalArea.' m^2 <br>';
            $Binding_txt = '';
            $Binding_price = 0;
            if($glossLamination_C==1){
                $Binding_price += intval($glossLamination * $totalArea);
                $Binding_txt.= $Binding_price.'(Gloss),';
            }
            if($mattLamination_C==1){
                $addedPrice = intval($mattLamination * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Matt),';
            }
            if($aqueousVarnishing_C==1){
                $addedPrice = intval($aqueousVarnishing * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Aqueous),';
            }
            if($uvCoating_C==1){
                $addedPrice = intval($uvCoating * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(UV),';
            }
            if($dieCut_C==1){
                $addedPrice = intval($dieCut * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Diecut),';
            }
            if($spotUV_C==1){
                $addedPrice = intval($spotUV * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(SpotUV),';
            }
            if($embossDebossed_C==1){
                $addedPrice = intval($embossDebossed * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Emboss),';
            }
            if($texturedEffect_C==1){
                $addedPrice = intval($texturedEffect * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Textured),';
            }
            if($foilStamping_C==1){
                $addedPrice = intval($foilStamping * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Foil),';
            }
            $fomula_txt .='Binding cost: '.$Binding_price . '= '.$Binding_txt.'<br>';

            $finalCost = $printpaperCost + $printingPrice + $Binding_price;

            $fomula_txt .='Final Cost: '.$finalCost.' = '.$printpaperCost.' + '.$printingPrice . ' + '.$Binding_price.'<br>';

            // $fomula_txt .='Paper Final cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * '. $paperCost. ' * '.($material2 / 1000).' = '.$returncost.'<br>';

            
            $fomula_txt .=`</p>
            </div>`;
            $data = ["success"=>'true'];

            $data['cost'] = $finalCost;
            $data['formula'] = $fomula_txt;

            return response()->json($fomula_txt)->header('Content-Type', 'text/html');
            // return response()->json($data)->header('Access-Control-Allow-Origin', '*');
            // return view('paperbox')->with('data',$data);
        }
        
        // return view('paperbox' ,['data'=>$data]);

    }
    public function storeMailerbox(Request $request){
        $fomula_txt = `<div class="formula-area col-6">
        <p style="font-size:1.2rem; font-weight:bold;">
        ----- CALCULATION FOMULA ----- <br><br>`;
        $input = $request->all();
        $L = intval($input['productSize1']);
        $W = intval($input['productSize2']);
        $H = intval($input['productSize3']);
        $quantity = intval($input['printQuantity1']);
        $material1 = $input['material1'];
        $material2 = intval($input['material2']);
        $material3 = intval($input['material3']);
        
        $gludeSize = intval($input['gluedSize']);
        $flapSize = intval($input['flapSize']);
        $bleedSize = intval($input['bleedSize']);
        $fixedSize = intval($input['fixedSize']); 

        $print1PaperSizeW = intval($input['print1PaperSizeW']);
        $print1PaperSizeH = intval($input['print1PaperSizeH']);
        $print2PaperSizeW = intval($input['print2PaperSizeW']);
        $print2PaperSizeH = intval($input['print2PaperSizeH']);
        
        $paperwastageNumber = intval($input['paperwastageNumber']);
        $paperCost = intval($input['paperCost']);

        // Printing setting parameters
        $pintingbelow3000 = $input['pintingbelow3000'];
        $printingper1000 = $input['printingper1000'];
        $brownkindprice = $input['brownkindprice'];
        $whitekindprice = $input['whitekindprice'];

        // Binding setting parameters
        $glossLamination = (float)$input['glossLamination'];
        $mattLamination = (float)$input['mattLamination'];
        $aqueousVarnishing = (float)$input['aqueousVarnishing'];
        $uvCoating = (float)$input['uvCoating'];
        $dieCut = (float)$input['dieCut'];
        $spotUV = (float)$input['spotUV'];
        $embossDebossed = (float)$input['embossDebossed'];
        $texturedEffect = (float)$input['texturedEffect'];
        $foilStamping = (float)$input['foilStamping'];
        $gluedcost = (float)$input['gluedcost'];

        //Binding User setting

        $glossLamination_C = $input['glossLamination_C'];
        $mattLamination_C = $input['mattLamination_C'];
        $aqueousVarnishing_C = $input['aqueousVarnishing_C'];
        $uvCoating_C = $input['uvCoating_C'];
        $dieCut_C = 1;//$input['dieCut_C'];
        $spotUV_C = $input['spotUV_C'];
        $embossDebossed_C = $input['embossDebossed_C'];
        $texturedEffect_C = $input['texturedEffect_C'];
        $foilStamping_C = $input['foilStamping_C'];
        $gluedcost_C = 1;//$input['gluedcost_C'];

        $flat_size1 = $L + $H * 4 + $gludeSize + 2 * $bleedSize;
        $flat_size2 = ($H + $W)*2 + $H + 2 * $bleedSize;

        $fomula_txt .='Die Cut Width (mm):  '.$L.' + '.$H.' * 4 + '.$gludeSize.' + 2 * '.$bleedSize.' = '.$flat_size1.'<br>';
        $fomula_txt .='Die Cut Height(mm):  ('.$H.' + '.$W.')*2 + '.$H.' + 2 * '.$bleedSize.' = '.$flat_size2.'<br>';
        
        // case 1: 889*658
        $fumula_maximum_txt = '';
        $printplatepapersize = [
            "0"=>[
                "0" => $print1PaperSizeW,
                "1" => $print1PaperSizeH
            ],
            "1" =>[
                "0" => $print2PaperSizeW,
                "1" => $print2PaperSizeH
            ]
            ];
        $max_case = 0;
        $max_number1 = 0;
        $max_number2 = 0;
        $max_criteria = $printplatepapersize["0"]["0"] * $printplatepapersize["0"]["1"];
        // case 11:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 1: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 1;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 1 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
            }
        // case 12:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size2 + $bleedSize));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size1 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 2: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 2;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 2 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 21:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 3: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 3;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 3 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 22:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size2));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size1)*$number2+$fixedSize + 2*$bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 4: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 4;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 4 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }

        
        if($max_number1 == 0 || $max_number2 == 0){
            $data = ["success"=>'false'];
            return response()->json($data);
        }else{
            $fomula_txt .= $fumula_maximum_txt;
            $paper_quantity = ceil($quantity / ($max_number1 * $max_number2));
            $fomula_txt .='Paper Quantity :  '.$quantity.' / '.($max_number1 * $max_number2).' = '. $paper_quantity;
            if ($quantity <= 5000){
                $paper_quantity += $paperwastageNumber;
                $fomula_txt .= ' + '.$paperwastageNumber.' = '.$paper_quantity;
            }
            $fomula_txt .='<br>';    
            if($max_case > 2) {
                $printpapersizeWidth = $printplatepapersize["1"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }else{
                $printpapersizeWidth = $printplatepapersize["0"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }
            $printpapersize = $max_criteria * ($max_number1 * $max_number2);

            $kindCost = $material3==1?$brownkindprice:$whitekindprice;

            $printpaperCost = intval($printpapersize / 1000000 * $paper_quantity * ($paperCost  *  $material2 / 1000 + $kindCost));

            $fomula_txt .='Paper cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * ('. $paperCost.' * '.($material2 / 1000).'+'.$kindCost.') = '.$printpaperCost.'<br>';

            // Insert Printing price.
            $printingPrice = $pintingbelow3000;
            if($paper_quantity > 3000){
                $printingPrice += ceil(($paper_quantity-3000)/1000) * $printingper1000;
            }
            $fomula_txt .='Printing cost: '.$printingPrice.'<br>';
            // calculation total area
            $totalArea = floatval($printpapersize / 1000000 * $paper_quantity);
            $fomula_txt .='Total Area: '.$totalArea.' m^2 <br>';
            $Binding_txt = '';
            $Binding_price = 0;
            if($glossLamination_C==1){
                $Binding_price += round($glossLamination * $totalArea);
                $Binding_txt.= $Binding_price.'(Gloss),';
            }
            if($mattLamination_C==1){
                $addedPrice = round($mattLamination * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Matt),';
            }
            if($aqueousVarnishing_C==1){
                $addedPrice = round($aqueousVarnishing * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Aqueous),';
            }
            if($uvCoating_C==1){
                $addedPrice = round($uvCoating * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(UV),';
            }
            if($dieCut_C==1){
                $addedPrice = round($dieCut * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Diecut),';
            }
            if($spotUV_C==1){
                $addedPrice = round($spotUV * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(SpotUV),';
            }
            if($embossDebossed_C==1){
                $addedPrice = round($embossDebossed * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Emboss),';
            }
            if($texturedEffect_C==1){
                $addedPrice = round($texturedEffect * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Textured),';
            }
            if($foilStamping_C==1){
                $addedPrice = round($foilStamping * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Foil),';
            }
            if($gluedcost_C==1){
                $addedPrice = round($gluedcost * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Glued),';
            }
            $fomula_txt .='Binding cost: '.$Binding_price . '= '.$Binding_txt.'<br>';

            $finalCost = $printpaperCost + $printingPrice + $Binding_price;

            $fomula_txt .='Final Cost: '.$finalCost.' = '.$printpaperCost.' + '.$printingPrice . ' + '.$Binding_price.'<br>';

            // $fomula_txt .='Paper Final cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * '. $paperCost. ' * '.($material2 / 1000).' = '.$returncost.'<br>';

            
            $fomula_txt .=`</p>
            </div>`;
            $data = ["success"=>'true'];

            $data['cost'] = $finalCost;
            $data['formula'] = $fomula_txt;

            return response()->json($fomula_txt)->header('Content-Type', 'text/html');
            // return response()->json($data)->header('Access-Control-Allow-Origin', '*');
            // return view('paperbox')->with('data',$data);
        }
        
        // return view('paperbox' ,['data'=>$data]);

    }
    public function storeShippingbox(Request $request){
        $fomula_txt = `<div class="formula-area col-6">
        <p style="font-size:1.2rem; font-weight:bold;">
        ----- CALCULATION FOMULA ----- <br><br>`;
        $input = $request->all();
        $L = intval($input['productSize1']);
        $W = intval($input['productSize2']);
        $H = intval($input['productSize3']);
        $quantity = intval($input['printQuantity1']);
        $material1 = $input['material1'];
        $material2 = intval($input['material2']);
        $material3 = intval($input['material3']);
        
        $gludeSize = intval($input['gluedSize']);
        $flapSize = intval($input['flapSize']);
        $bleedSize = intval($input['bleedSize']);
        $fixedSize = intval($input['fixedSize']); 

        $print1PaperSizeW = intval($input['print1PaperSizeW']);
        $print1PaperSizeH = intval($input['print1PaperSizeH']);
        $print2PaperSizeW = intval($input['print2PaperSizeW']);
        $print2PaperSizeH = intval($input['print2PaperSizeH']);
        
        $paperwastageNumber = intval($input['paperwastageNumber']);
        $paperCost = intval($input['paperCost']);

        // Printing setting parameters
        $pintingbelow3000 = $input['pintingbelow3000'];
        $printingper1000 = $input['printingper1000'];
        $brownkindprice = $input['brownkindprice'];
        $whitekindprice = $input['whitekindprice'];

        // Binding setting parameters
        $glossLamination = (float)$input['glossLamination'];
        $mattLamination = (float)$input['mattLamination'];
        $aqueousVarnishing = (float)$input['aqueousVarnishing'];
        $uvCoating = (float)$input['uvCoating'];
        $dieCut = (float)$input['dieCut'];
        $spotUV = (float)$input['spotUV'];
        $embossDebossed = (float)$input['embossDebossed'];
        $texturedEffect = (float)$input['texturedEffect'];
        $foilStamping = (float)$input['foilStamping'];
        $gluedcost = (float)$input['gluedcost'];

        //Binding User setting

        $glossLamination_C = $input['glossLamination_C'];
        $mattLamination_C = $input['mattLamination_C'];
        $aqueousVarnishing_C = $input['aqueousVarnishing_C'];
        $uvCoating_C = $input['uvCoating_C'];
        $dieCut_C = 1;//$input['dieCut_C'];
        $spotUV_C = $input['spotUV_C'];
        $embossDebossed_C = $input['embossDebossed_C'];
        $texturedEffect_C = $input['texturedEffect_C'];
        $foilStamping_C = $input['foilStamping_C'];
        $gluedcost_C = 1;//$input['gluedcost_C'];

        $flat_size1 = $L + $H * 4 + $gludeSize + 2 * $bleedSize;
        $flat_size2 = ($H + $W)*2 + $H + 2 * $bleedSize;

        $fomula_txt .='Die Cut Width (mm):  '.$L.' + '.$H.' * 4 + '.$gludeSize.' + 2 * '.$bleedSize.' = '.$flat_size1.'<br>';
        $fomula_txt .='Die Cut Height(mm):  ('.$H.' + '.$W.')*2 + '.$H.' + 2 * '.$bleedSize.' = '.$flat_size2.'<br>';
        
        // case 1: 889*658
        $fumula_maximum_txt = '';
        $printplatepapersize = [
            "0"=>[
                "0" => $print1PaperSizeW,
                "1" => $print1PaperSizeH
            ],
            "1" =>[
                "0" => $print2PaperSizeW,
                "1" => $print2PaperSizeH
            ]
            ];
        $max_case = 0;
        $max_number1 = 0;
        $max_number2 = 0;
        $max_criteria = $printplatepapersize["0"]["0"] * $printplatepapersize["0"]["1"];
        // case 11:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 1: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 1;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 1 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
            }
        // case 12:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size2 + $bleedSize));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size1 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 2: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 2;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 2 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 21:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 3: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 3;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 3 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 22:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size2));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size1)*$number2+$fixedSize + 2*$bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 4: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 4;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 4 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }

        
        if($max_number1 == 0 || $max_number2 == 0){
            $data = ["success"=>'false'];
            return response()->json($data);
        }else{
            $fomula_txt .= $fumula_maximum_txt;
            $paper_quantity = ceil($quantity / ($max_number1 * $max_number2));
            $fomula_txt .='Paper Quantity :  '.$quantity.' / '.($max_number1 * $max_number2).' = '. $paper_quantity;
            if ($quantity <= 5000){
                $paper_quantity += $paperwastageNumber;
                $fomula_txt .= ' + '.$paperwastageNumber.' = '.$paper_quantity;
            }
            $fomula_txt .='<br>';    
            if($max_case > 2) {
                $printpapersizeWidth = $printplatepapersize["1"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }else{
                $printpapersizeWidth = $printplatepapersize["0"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }
            $printpapersize = $max_criteria * ($max_number1 * $max_number2);

            $kindCost = $material3==1?$brownkindprice:$whitekindprice;

            $printpaperCost = intval($printpapersize / 1000000 * $paper_quantity * ($paperCost  *  $material2 / 1000 + $kindCost));

            $fomula_txt .='Paper cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * ('. $paperCost.' * '.($material2 / 1000).'+'.$kindCost.') = '.$printpaperCost.'<br>';

            // Insert Printing price.
            $printingPrice = $pintingbelow3000;
            if($paper_quantity > 3000){
                $printingPrice += ceil(($paper_quantity-3000)/1000) * $printingper1000;
            }
            $fomula_txt .='Printing cost: '.$printingPrice.'<br>';
            // calculation total area
            $totalArea = floatval($printpapersize / 1000000 * $paper_quantity);
            $fomula_txt .='Total Area: '.$totalArea.' m^2 <br>';
            $Binding_txt = '';
            $Binding_price = 0;
            if($glossLamination_C==1){
                $Binding_price += round($glossLamination * $totalArea);
                $Binding_txt.= $Binding_price.'(Gloss),';
            }
            if($mattLamination_C==1){
                $addedPrice = round($mattLamination * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Matt),';
            }
            if($aqueousVarnishing_C==1){
                $addedPrice = round($aqueousVarnishing * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Aqueous),';
            }
            if($uvCoating_C==1){
                $addedPrice = round($uvCoating * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(UV),';
            }
            if($dieCut_C==1){
                $addedPrice = round($dieCut * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Diecut),';
            }
            if($spotUV_C==1){
                $addedPrice = round($spotUV * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(SpotUV),';
            }
            if($embossDebossed_C==1){
                $addedPrice = round($embossDebossed * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Emboss),';
            }
            if($texturedEffect_C==1){
                $addedPrice = round($texturedEffect * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Textured),';
            }
            if($foilStamping_C==1){
                $addedPrice = round($foilStamping * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Foil),';
            }
            if($gluedcost_C==1){
                $addedPrice = round($gluedcost * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Glued),';
            }
            $fomula_txt .='Binding cost: '.$Binding_price . '= '.$Binding_txt.'<br>';

            $finalCost = $printpaperCost + $printingPrice + $Binding_price;

            $fomula_txt .='Final Cost: '.$finalCost.' = '.$printpaperCost.' + '.$printingPrice . ' + '.$Binding_price.'<br>';

            // $fomula_txt .='Paper Final cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * '. $paperCost. ' * '.($material2 / 1000).' = '.$returncost.'<br>';

            
            $fomula_txt .=`</p>
            </div>`;
            $data = ["success"=>'true'];

            $data['cost'] = $finalCost;
            $data['formula'] = $fomula_txt;

            return response()->json($fomula_txt)->header('Content-Type', 'text/html');
            // return response()->json($data)->header('Access-Control-Allow-Origin', '*');
            // return view('paperbox')->with('data',$data);
        }
        
        // return view('paperbox' ,['data'=>$data]);

    }
    public function storeRigidbox(Request $request){
        $fomula_txt = `<div class="formula-area col-6">
        <p style="font-size:1.2rem; font-weight:bold;">
        ----- CALCULATION FOMULA ----- <br><br>`;
        $input = $request->all();
        $L = intval($input['productSize1']);
        $W = intval($input['productSize2']);
        $H = intval($input['productSize3']);
        $quantity = intval($input['printQuantity1']);
        $material1 = $input['material1'];
        $material2 = intval($input['material2']);
        $material3 = intval($input['material3']);
        
        $gludeSize = intval($input['gluedSize']);
        $flapSize = intval($input['flapSize']);
        $bleedSize = intval($input['bleedSize']);
        $fixedSize = intval($input['fixedSize']); 

        $print1PaperSizeW = intval($input['print1PaperSizeW']);
        $print1PaperSizeH = intval($input['print1PaperSizeH']);
        $print2PaperSizeW = intval($input['print2PaperSizeW']);
        $print2PaperSizeH = intval($input['print2PaperSizeH']);
        
        $paperwastageNumber = intval($input['paperwastageNumber']);
        $paperCost = intval($input['paperCost']);

        // Printing setting parameters
        $pintingbelow3000 = $input['pintingbelow3000'];
        $printingper1000 = $input['printingper1000'];
        $brownkindprice = $input['brownkindprice'];
        $whitekindprice = $input['whitekindprice'];

        // Binding setting parameters
        $glossLamination = (float)$input['glossLamination'];
        $mattLamination = (float)$input['mattLamination'];
        $aqueousVarnishing = (float)$input['aqueousVarnishing'];
        $uvCoating = (float)$input['uvCoating'];
        $dieCut = (float)$input['dieCut'];
        $spotUV = (float)$input['spotUV'];
        $embossDebossed = (float)$input['embossDebossed'];
        $texturedEffect = (float)$input['texturedEffect'];
        $foilStamping = (float)$input['foilStamping'];
        $gluedcost = (float)$input['gluedcost'];

        //Binding User setting

        $glossLamination_C = $input['glossLamination_C'];
        $mattLamination_C = $input['mattLamination_C'];
        $aqueousVarnishing_C = $input['aqueousVarnishing_C'];
        $uvCoating_C = $input['uvCoating_C'];
        $dieCut_C = 1;//$input['dieCut_C'];
        $spotUV_C = $input['spotUV_C'];
        $embossDebossed_C = $input['embossDebossed_C'];
        $texturedEffect_C = $input['texturedEffect_C'];
        $foilStamping_C = $input['foilStamping_C'];
        $gluedcost_C = 1;//$input['gluedcost_C'];

        $flat_size1 = $L + $H * 4 + $gludeSize + 2 * $bleedSize;
        $flat_size2 = ($H + $W)*2 + $H + 2 * $bleedSize;

        $fomula_txt .='Die Cut Width (mm):  '.$L.' + '.$H.' * 4 + '.$gludeSize.' + 2 * '.$bleedSize.' = '.$flat_size1.'<br>';
        $fomula_txt .='Die Cut Height(mm):  ('.$H.' + '.$W.')*2 + '.$H.' + 2 * '.$bleedSize.' = '.$flat_size2.'<br>';
        
        // case 1: 889*658
        $fumula_maximum_txt = '';
        $printplatepapersize = [
            "0"=>[
                "0" => $print1PaperSizeW,
                "1" => $print1PaperSizeH
            ],
            "1" =>[
                "0" => $print2PaperSizeW,
                "1" => $print2PaperSizeH
            ]
            ];
        $max_case = 0;
        $max_number1 = 0;
        $max_number2 = 0;
        $max_criteria = $printplatepapersize["0"]["0"] * $printplatepapersize["0"]["1"];
        // case 11:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 1: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 1;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 1 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
            }
        // case 12:
        $number1 = floor(($printplatepapersize["0"]["0"] - 2 * $bleedSize)/($flat_size2 + $bleedSize));
        $number2 = floor(($printplatepapersize["0"]["1"] - $fixedSize  - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["0"]["0"] * (($flat_size1 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 2: '.intval($c_criteria).' = '.$printplatepapersize["0"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 2;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 2 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["0"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 21:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size1));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size2));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size2 + $bleedSize)*$number2+$fixedSize + $bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 3: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size2)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size1) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size2) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 3;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 3 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size1.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size2.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }
        // case 22:
        $number1 = floor(($printplatepapersize["1"]["0"] - 2 * $bleedSize)/($flat_size2));
        $number2 = floor(($printplatepapersize["1"]["1"] - $fixedSize - 2 * $bleedSize)/($flat_size1));
        if($number1 == 0 || $number2 == 0)
            $c_criteria = 9999999999;
        else
            $c_criteria = $printplatepapersize["1"]["0"] * (($flat_size1)*$number2+$fixedSize + 2*$bleedSize) / ($number1 * $number2);
            $fomula_txt .='case 4: '.intval($c_criteria).' = '.$printplatepapersize["1"]["0"].' * '.(($flat_size1)*$number2+$fixedSize+ 2*$bleedSize).' / '. ($number1 * $number2).'<br>';
            if( $max_criteria > $c_criteria){
                $max_width = ($flat_size2) * $number1 + 2*$bleedSize;
                $max_height = ($flat_size1) * $number2 + $fixedSize+ 2*$bleedSize;
                $max_case = 4;
                $max_criteria = $c_criteria;
                $max_number1 = $number1;
                $max_number2 = $number2;
                $fumula_maximum_txt = 'Optimized result Case 4 : '.$number1 .' * '.$number2.' = '.($number1 * $number2).'  in '.$printplatepapersize["1"]["0"].' * '. $max_height.'<br>';
                $fumula_maximum_txt .= 'Paper plate width: '.$flat_size2.' * '.$number1.' + 2 * '.$bleedSize.' = '.$max_width.'<br>';
                $fumula_maximum_txt .= 'Paper plate height: '.$flat_size1.' * '.$number2.' + 2 * '.$bleedSize.' + '.$fixedSize.' = '.$max_height.'<br>';
                
            }

        
        if($max_number1 == 0 || $max_number2 == 0){
            $data = ["success"=>'false'];
            return response()->json($data);
        }else{
            $fomula_txt .= $fumula_maximum_txt;
            $paper_quantity = ceil($quantity / ($max_number1 * $max_number2));
            $fomula_txt .='Paper Quantity :  '.$quantity.' / '.($max_number1 * $max_number2).' = '. $paper_quantity;
            if ($quantity <= 5000){
                $paper_quantity += $paperwastageNumber;
                $fomula_txt .= ' + '.$paperwastageNumber.' = '.$paper_quantity;
            }
            $fomula_txt .='<br>';    
            if($max_case > 2) {
                $printpapersizeWidth = $printplatepapersize["1"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }else{
                $printpapersizeWidth = $printplatepapersize["0"]["0"];
                $printpapersizeHeight = $max_criteria / $printpapersizeWidth;
            }
            $printpapersize = $max_criteria * ($max_number1 * $max_number2);

            $kindCost = $material3==1?$brownkindprice:$whitekindprice;

            $printpaperCost = intval($printpapersize / 1000000 * $paper_quantity * ($paperCost  *  $material2 / 1000 + $kindCost));

            $fomula_txt .='Paper cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * ('. $paperCost.' * '.($material2 / 1000).'+'.$kindCost.') = '.$printpaperCost.'<br>';

            // Insert Printing price.
            $printingPrice = $pintingbelow3000;
            if($paper_quantity > 3000){
                $printingPrice += ceil(($paper_quantity-3000)/1000) * $printingper1000;
            }
            $fomula_txt .='Printing cost: '.$printingPrice.'<br>';
            // calculation total area
            $totalArea = floatval($printpapersize / 1000000 * $paper_quantity);
            $fomula_txt .='Total Area: '.$totalArea.' m^2 <br>';
            $Binding_txt = '';
            $Binding_price = 0;
            if($glossLamination_C==1){
                $Binding_price += round($glossLamination * $totalArea);
                $Binding_txt.= $Binding_price.'(Gloss),';
            }
            if($mattLamination_C==1){
                $addedPrice = round($mattLamination * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Matt),';
            }
            if($aqueousVarnishing_C==1){
                $addedPrice = round($aqueousVarnishing * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Aqueous),';
            }
            if($uvCoating_C==1){
                $addedPrice = round($uvCoating * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(UV),';
            }
            if($dieCut_C==1){
                $addedPrice = round($dieCut * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Diecut),';
            }
            if($spotUV_C==1){
                $addedPrice = round($spotUV * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(SpotUV),';
            }
            if($embossDebossed_C==1){
                $addedPrice = round($embossDebossed * $paper_quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Emboss),';
            }
            if($texturedEffect_C==1){
                $addedPrice = round($texturedEffect * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Textured),';
            }
            if($foilStamping_C==1){
                $addedPrice = round($foilStamping * $quantity);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Foil),';
            }
            if($gluedcost_C==1){
                $addedPrice = round($gluedcost * $totalArea);
                $Binding_price += $addedPrice;
                $Binding_txt.= $addedPrice.'(Glued),';
            }
            $fomula_txt .='Binding cost: '.$Binding_price . '= '.$Binding_txt.'<br>';

            $finalCost = $printpaperCost + $printingPrice + $Binding_price;

            $fomula_txt .='Final Cost: '.$finalCost.' = '.$printpaperCost.' + '.$printingPrice . ' + '.$Binding_price.'<br>';

            // $fomula_txt .='Paper Final cost: '.($printpapersizeWidth/1000).' * '.($max_height/1000).' * '.$paper_quantity.' * '. $paperCost. ' * '.($material2 / 1000).' = '.$returncost.'<br>';

            
            $fomula_txt .=`</p>
            </div>`;
            $data = ["success"=>'true'];

            $data['cost'] = $finalCost;
            $data['formula'] = $fomula_txt;

            return response()->json($fomula_txt)->header('Content-Type', 'text/html');
            // return response()->json($data)->header('Access-Control-Allow-Origin', '*');
            // return view('paperbox')->with('data',$data);
        }
        
        // return view('paperbox' ,['data'=>$data]);

    }

    public function showUserBubble(){
        
        return view('userbubble');
    }

    public function showUserPoly(){
        return view('userpoly');
    }

    public function storeUserBubble(Request $request){
        $data = $request->all();
        $settings = BubbleSetting::first();
        // dd($settings);
        $W = $data['productSize1'];
        $L = $data['productSize2'];
        $LoS = $data['productSize3'];
        $NoPC = intval($data['printingType']);
        $Quantity = intval($data['quantity']);
        $PpS = $settings["matPrice".$data['MaterailType']];
        $squre_meter1 = floatval($W*($L + $LoS/2))*2/1000000 ;
        $Price1 = $squre_meter1 * $PpS;
        // $result = $squre_meter * ($data['productSize1'] > 38 ? 1:2) * $matPrice;
        // add printing price
        $printingPrice = $squre_meter1;
        switch($NoPC){
            case 1:
                $printingPrice *= $settings['printingFee1'];
                break;
            case 2:
                $printingPrice *= $settings['printingFee2'];
                break;
            case 3:
                $printingPrice *= $settings['printingFee3'];
                break;
            case 4:
                $printingPrice *= $settings['printingFee4'];
                break;
            case 5:
                $printingPrice *= $settings['printingFee5'];
                break;
            default:
                $printingPrice *= $settings['printingFee1'];
        }
        // $result += $printingPrice;

        $squre_meter2 = floatval($L*2 +$LoS + 60 ) * $W * 0.12/1000000;
        $Price2 = floatval($squre_meter2 * ($W > 38 ? 1:2) * $NoPC)/$Quantity;

        $Price3 = ($W*2 + 600 + 90)*2*(600+$L+$LoS/2 + 60)*4.5/200000000;

        $Price = $Price1 + $printingPrice + $Price2 + $Price3;

        $totalPrice = $Price * $settings['taxPoint'] * $settings['profit'];

        $currencyRate = 1;
        switch($data['currencyType']){
            case '2':
                $currencyRate = $settings['usdCur'];
                break;
            case '3':
                $currencyRate = $settings['euroCur'];
                break;
            case '4':
                $currencyRate = $settings['poundCur'];
                break;
            default:
                $currencyRate = 1;
        }

        $totalPrice *= $currencyRate * $Quantity;
        return intval($totalPrice);
    }

    public function storeUserPoly(Request $request){
        $data = $request->all();
        $settings = PolySetting::first();
        // dd($settings);
        $W = $data['productSize1'];
        $L = $data['productSize2'];
        $LoS = $data['productSize3'];
        $NoPC = intval($data['printingType']);
        $materialType = $data['materialType'];
        $TN = floatval($data['thickness']);
        $Quantity = intval($data['quantity']);
        $squre_meter1 = floatval($W*($L + $LoS/2))*$TN*0.185/100000 ;
        $Price1 = $squre_meter1 * ($materialType == '0'?$settings['priceLd']:$settings['priceHd']);
        // $result = $squre_meter * ($data['productSize1'] > 38 ? 1:2) * $matPrice;
        // add printing price
        $printingPrice = $squre_meter1;
        switch($NoPC){
            case 1:
                $printingPrice *= $settings['printingFee1'];
                break;
            case 2:
                $printingPrice *= $settings['printingFee2'];
                break;
            case 3:
                $printingPrice *= $settings['printingFee3'];
                break;
            case 4:
                $printingPrice *= $settings['printingFee4'];
                break;
            case 5:
                $printingPrice *= $settings['printingFee5'];
                break;
            default:
                $printingPrice *= $settings['printingFee1'];
        }
        // $result += $printingPrice;

        // $squre_meter2 = floatval($L*2 +$LoS + 60 ) * $W * 0.12;
        $Price2 = 0;

        $Price3 = ($W*2 + 600 + 90)*2*(600+$L+$LoS/2 + 60)*4.5/200000000;

        $Price = $Price1 + $printingPrice + $Price2 + $Price3;

        $totalPrice = $Price * $settings['taxPoint'] * $settings['profit'];

        $currencyRate = 1;
        switch($data['currencyType']){
            case '2':
                $currencyRate = $settings['usdCur'];
                break;
            case '3':
                $currencyRate = $settings['euroCur'];
                break;
            case '4':
                $currencyRate = $settings['poundCur'];
                break;
            default:
                $currencyRate = 1;
        }

        $totalPrice *= $currencyRate * $Quantity;
        return intval($totalPrice);
    }

    public function showWaleng(){
        return view('waleng');
    }

    public function storeWaleng(Request $request){
        // dd($request);
        $input = $request->all();
        $input['boxType'] = "corrugatedBox";
        $waleng_id =  Package::create($input)->id;
         $this->delay($waleng_id);
         $flag = Package::select('status')->where('id',$waleng_id)->first()->status;
         // file_put_contents('234.txt',$flag);
         if( $flag == 'update')  {
             $result =  Result::where('package_id',$waleng_id)->get();
         }           
         else{
             $result = 'failed';
         }
             
         return response()->json(['result' => $result]);
    }
}
