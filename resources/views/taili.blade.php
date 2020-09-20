@extends('layouts.package')
@section('content')
<form action="">
    <div class="container-fluid row m-0 p-0">
        <div class="col-lg-6">
            <h3>Self quotation</h3>
            <div class="row">
                <div class="col">
                    <label for="sel1">Finished product size [width * height (binding edge)] (mm):</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" value="210" class="form-control" id="productSize1" name="productSize1">
                </div>
                <div class="col">
                    <input type="text" value="140" class="form-control" id="productSize2" name="productSize2">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Length and width of the tripod stand in mm:</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" value="210" class="form-control" id="tripodSize1" name="tripodSize1">
                </div>
                <div class="col">
                    <input type="text" value="360" class="form-control" id="tripodSize2" name="tripodSize2">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Triangle bracket thickness mm:</label>
                </div>
            </div>
            <div class="form-group">
                <select class="form-control" id="bracket" name="bracket">
                    <option value="1.5">1.5mm</option>
                    <option selected value="2">2mm</option>
                    <option value="2.5">2.5mm</option>
                    <option value="3">3mm</option>
                    
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Number of prints (books):</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" value="1000" class="form-control" id="printsBook" name="printsBook">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Piercing:</label>
                </div>
            </div>
            <div class="form-group">
                <select class="form-control" id="piercing" name="piercing">
                    <option value="0">The long side</option>
                    <option selected value="1">Short side</option>
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Color of the ring:</label>
                </div>
            </div>
            <div class="form-group">
                <select class="form-control" id="colorRing" name="colorRing">
                    <option value="0">color</option>
                    <option value="1">Black and White</option>
                </select>
            </div>
        </div>
        <div class="col-lg-6 row">
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Text</h3>
                <!-- <div class="row">
                    <div class="col-12">
                        <label for="sel1">Text:</label>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <select name="selText" id="selText" class="form-control">
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="12">12</option>
                            <option selected value="13">13</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="sel1">Inside page material (material*gram weight):</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select name="material1" id="material1" class="form-control float-left w-47">
                            <option value="14">C2S</option>
                            <option value="16">SBS</option>
                            <option value="15">Wooden free paper</option>
                            <option value="17">Kraft Paper</option>
                        </select>
                        <select name="material2" id="material2" class="form-control float-right w-47">
                            <option value="13">80</option>
                            <option value="123">105</option>
                            <option value="9">128</option>
                            <option selected value="111">157</option>
                            <option value="11">200</option>
                            <option value="102">250</option>
                            <option value="103">300</option>
                            <option value="14">350</option>
                        </select>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="sel1">Printing color (front*reverse):</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select name="printColor1" id="printColor1" class="form-control float-left w-47">
                            <option value="7">multicolor</option>
                            <option value="8">black</option>
                            <option value="9">2 spot colors</option>
                            <option value="10">1 spot color</option>
                            <option value="12">multicolor + 1 spot color</option>
                            <option value="13">multicolor + 2 spot colors</option>
                            <option value="14">multicolor + varnishing</option>
                            <option value="15">varnishing</option>
                        </select>
                        <select name="printColor2" id="printColor2" class="form-control float-right w-47">
                            <option value="7">multicolor</option>
                            <option value="8">black</option>
                            <option value="9">2 spot colors</option>
                            <option value="10">1 spot color</option>
                            <option value="12">multicolor + 1 spot color</option>
                            <option value="13">multicolor + 2 spot colors</option>
                            <option value="14">multicolor + varnishing</option>
                            <option value="15">varnishing</option>
                            <option value="0">none</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Outer Liner</h3>
                <!-- <div class="row">
                    <div class="col-12">
                        <label for="sel1">Outer Liner:</label>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox custom-check-middle">
                            <input type="hidden" name="outerPrinting" value="0"/>
                            <input type="checkbox" class="custom-control-input" checked name="outerPrinting" value="1" id="outerPrinting">
                            <label class="custom-control-label" for="outerPrinting">Printing</label>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        <label for="sel1">Inside page material (material*gram weight):</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select name="outerMaterial1" id="outerMaterial1" class="form-control float-left w-47">
                            <option value="14">C2S</option>
                            <option value="16">SBS</option>
                            <option value="15">Wooden free paper</option>
                            <option value="17">Kraft Paper</option>
                        </select>
                        <select name="outerMaterial2" id="outerMaterial2" class="form-control float-right w-47">
                            <option value="13">80</option>
                            <option value="123">105</option>
                            <option value="9">128</option>
                            <option selected value="111">157</option>
                            <option value="11">200</option>
                            <option value="102">250</option>
                            <option value="103">300</option>
                            <option value="14">350</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">                
                        <label for="sel1">Printing color:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select name="outerPrintingcolor1" id="outerPrintingcolor1" class="form-control">
                            <option value="7">multicolor</option>
                            <option value="8">black</option>
                            <option value="9">2 spot colors</option>
                            <option value="10">1 spot color</option>
                            <option value="12">multicolor + 1 spot color</option>
                            <option value="13">multicolor + 2 spot colors</option>
                            <option value="14">multicolor + varnishing</option>
                            <option value="15">varnishing</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="Lamination" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="Lamination" value="1" id="Lamination">
                            <label class="custom-control-label" for="Lamination">Lamination</label>
                        </div>
                        <div id="tempLamination" style="display: none">
                            <select name="selLamination1" id="selLamination1" class="form-control float-left w-47">
                                <option value="single">Single</option>
                            </select>
                            <select name="selLamination2" id="selLamination2" class="form-control float-right w-47">
                                <option value="亮膜">GlossLamination</option>
                                <option value="哑膜">MattLamination</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="StampingSliver" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="StampingSliver" value="1" id="StampingSliver">
                            <label class="custom-control-label" for="StampingSliver">Foil Stamping (sliver)</label>
                        </div>
                        <div id="tempStampingSliver" style="display: none">
                            <input id="StampingSliverL" name="StampingSliverL" type="text" placeholder="L(mm)" class="form-control float-left w-47">
                            <span style="font-size:25px;">×</span>
                            <input id="StampingSliverW" name="StampingSliverW" type="text" placeholder="W(mm)" class="form-control float-right w-47">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="StampingGold" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="StampingGold" value="1" id="StampingGold">
                            <label class="custom-control-label" for="StampingGold">Foil Stamping (gold)</label>
                        </div>
                        <div id="tempStampingGold" style="display: none">
                            <input type="text" id="StampingGoldL" name="StampingGoldL" placeholder="L(mm)" class="form-control float-left w-47">
                            <span style="font-size:25px;">×</span>
                            <input type="text" id="StampingGoldW" name="StampingGoldW" placeholder="W(mm)" class="form-control float-right w-47">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Inner Liner</h3>
                <!-- <div class="row">
                    <div class="col-12">
                        <label for="sel1">Inner Liner:</label>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox custom-check-middle">
                            <input type="hidden" name="innerPrinting" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="innerPrinting" value="1" id="innerPrinting">
                            <label class="custom-control-label" for="innerPrinting">Printing</label>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12">
                        <label for="sel1">Inside page material (material*gram weight):</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select name="innerMaterial1" id="innerMaterial1" class="form-control float-left w-47">
                            <option value="14">C2S</option>
                            <option value="16">SBS</option>
                            <option selected value="15">Wooden free paper</option>
                            <option value="17">Kraft Paper</option>
                        </select>
                        <select name="innerMaterial2" id="innerMaterial2" class="form-control float-right w-47">
                            <option value='21'>60</option>"
                            <option selected value='18'>70</option>
                            <option value='112'>80</option>
                            <option value='16'>100</option>
                            <option value='17'>120</option>
                            <option value='19'>140</option>
                            <option value='113'>180</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label for="sel1">Printing color:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <select name="innerPrintingcolor1" id="innerPrintingcolor1" class="form-control">
                            <option value="7">multicolor</option>
                            <option value="8">black</option>
                            <option value="9">2 spot colors</option>
                            <option value="10">1 spot color</option>
                            <option value="12">multicolor + 1 spot color</option>
                            <option value="13">multicolor + 2 spot colors</option>
                            <option value="14">multicolor + varnishing</option>
                            <option value="15">varnishing</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button id="submit" type="submit" class="btn btn-primary mt-3">Self quotation</button>
    </div>
</form>
<div class="mt-3 container-fluid" id="ajaxdata"></div>
<script>
    $('#material1').on('change', function() {
        $("#material2 option").remove()
        switch(this.value){
            case '14':
                var html=''
                html +="<option value='13'>80</option>"
                html +="<option value='123'>105</option>"
                html +="<option value='9'>128</option>"
                html +="<option value='111'>157</option>"
                html +="<option value='11'>200</option>"
                html +="<option value='102'>250</option>"
                html +="<option value='103'>300</option>"
                html +="<option value='14'>250</option>"
                $('#material2').html(html);
                break;
            case '15':
                var html=''
                html +="<option value='21'>60</option>"
                html +="<option value='18'>70</option>"
                html +="<option value='112'>80</option>"
                html +="<option value='16'>100</option>"
                html +="<option value='17'>120</option>"
                html +="<option value='19'>140</option>"
                html +="<option value='113'>180</option>"
                $('#material2').html(html);
                break;
            case '16':
                var html=''
                html +="<option value='114'>210</option>"
                html +="<option value='115'>230</option>"
                html +="<option value='116'>250</option>"
                html +="<option value='117'>300</option>"
                $('#material2').html(html);
                break;
            case '17':
                var html=''
                html +="<option value='161'>60</option>"
                html +="<option value='105'>70</option>"
                html +="<option value='167'>100</option>"
                html +="<option value='163'>120</option>"
                $('#material2').html(html);
                break;
            default:
                break
        }
    });
    $('#outerMaterial1').on('change', function() {
        $("#outerMaterial2 option").remove()
        switch(this.value){
            case '14':
                var html=''
                html +="<option value='13'>80</option>"
                html +="<option value='123'>105</option>"
                html +="<option value='9'>128</option>"
                html +="<option value='111'>157</option>"
                html +="<option value='11'>200</option>"
                html +="<option value='102'>250</option>"
                html +="<option value='103'>300</option>"
                html +="<option value='14'>250</option>"
                $('#outerMaterial2').html(html);
                break;
            case '15':
                var html=''
                html +="<option value='21'>60</option>"
                html +="<option value='18'>70</option>"
                html +="<option value='112'>80</option>"
                html +="<option value='16'>100</option>"
                html +="<option value='17'>120</option>"
                html +="<option value='19'>140</option>"
                html +="<option value='113'>180</option>"
                $('#outerMaterial2').html(html);
                break;
            case '16':
                var html=''
                html +="<option value='114'>210</option>"
                html +="<option value='115'>230</option>"
                html +="<option value='116'>250</option>"
                html +="<option value='117'>300</option>"
                $('#outerMaterial2').html(html);
                break;
            case '17':
                var html=''
                html +="<option value='161'>60</option>"
                html +="<option value='105'>70</option>"
                html +="<option value='167'>100</option>"
                html +="<option value='163'>120</option>"
                $('#outerMaterial2').html(html);
                break;
            default:
                break
        }
    });
     $('#innerMaterial1').on('change', function() {
        $("#innerMaterial2 option").remove()
        switch(this.value){
            case '14':
                var html=''
                html +="<option value='13'>80</option>"
                html +="<option value='123'>105</option>"
                html +="<option value='9'>128</option>"
                html +="<option value='111'>157</option>"
                html +="<option value='11'>200</option>"
                html +="<option value='102'>250</option>"
                html +="<option value='103'>300</option>"
                html +="<option value='14'>250</option>"
                $('#innerMaterial2').html(html);
                break;
            case '15':
                var html=''
                html +="<option value='21'>60</option>"
                html +="<option value='18'>70</option>"
                html +="<option value='112'>80</option>"
                html +="<option value='16'>100</option>"
                html +="<option value='17'>120</option>"
                html +="<option value='19'>140</option>"
                html +="<option value='113'>180</option>"
                $('#innerMaterial2').html(html);
                break;
            case '16':
                var html=''
                html +="<option value='114'>210</option>"
                html +="<option value='115'>230</option>"
                html +="<option value='116'>250</option>"
                html +="<option value='117'>300</option>"
                $('#innerMaterial2').html(html);
                break;
            case '17':
                var html=''
                html +="<option value='161'>60</option>"
                html +="<option value='105'>70</option>"
                html +="<option value='167'>100</option>"
                html +="<option value='163'>120</option>"
                $('#innerMaterial2').html(html);
                break;
            default:
                break
        }
    });
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault()
        // alert('prevent');
        $.ajax({
            url: '{{ route("posttaili") }}',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // ContentType: "application/x-www-form-urlencoded; Charset=utf-8 ",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function()
            {
                $(".loader").css("display","flex");
            },
            success:function(data)
            {

                $(".loader").css("display","none");
                console.log('data',data.result[0].description);
                // debugger;
                html = "";
                // html +="<div class='row'><textarea cols='50' rows='3'>" + data.result[0].description + "</textarea></div>";
                html +=" <div class='row ml-3'><table class='table table-bordered col-lg-4 col-md-6 col-sm-6 col-xs-12'><thead><tr><th>Quantity</th><th>Full amount (yuan)</th><th>Tax included</th></tr></thead><tbody>";
                let print_quantity = $('#printsBook').val();
                print_quantity_div = parseInt(print_quantity / 1000);
                print_quantity_rest = parseInt(print_quantity % 1000);
                html +="<tr><td>" + parseInt(print_quantity_rest + 1000*(print_quantity_div)) + "</td><td>"
                                 + data.result[0].full_amount_1000 + "</td><td>"
                                 + data.result[0].tax_included_1000 + "</td></tr><tr><td>"
                                 +parseInt(1000*(print_quantity_div+1)) + "</td><td>"
                                 + data.result[0].full_amount_2000 + "</td><td>"
                                 + data.result[0].tax_included_2000 + "</td></tr><tr><td>"
                                 + parseInt(1000*(print_quantity_div+2)) + "</td><td>"
                                 + data.result[0].full_amount_3000 + "</td><td>"
                                 + data.result[0].tax_included_3000 + "</td></tr><tr><td>"
                                 + parseInt(1000*(print_quantity_div+3)) + "</td><td>"
                                 + data.result[0].full_amount_4000+ "</td><td>"
                                 + data.result[0].tax_included_4000+ "</td></tr><tr><td>"
                                 + parseInt(1000*(print_quantity_div+4))+ "</td><td>"
                                 + data.result[0].full_amount_5000+ "</td><td>"
                                 + data.result[0].tax_included_5000+ "</td></tr></tbody></table></div>"
                console.log(html);
                $('#ajaxdata').html(html);
            }
        });
    });
    $("#Lamination").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempLamination").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempLamination").css("display",'none')
        }
    })
    $("#StampingSliver").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempStampingSliver").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempStampingSliver").css("display",'none')
        }
    })

    $("#StampingGold").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempStampingGold").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempStampingGold").css("display",'none')
        }
    })

</script>
@endsection