@extends('layouts.package')
@section('content')
<form action="">
    <div class="container-fluid row m-0 p-0">
        <div class="col-lg-6">
            <h3>Self quotation</h3>
            <div class="row">
                <div class="col">
                    <label for="sel1">Finished product length * width (mm):</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" value="90" class="form-control" id="productSize1" name="productSize1">
                </div>
                <div class="col">
                    <input type="text" value="54" class="form-control" id="productSize2" name="productSize2">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Printing quantity * variety:</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" value="1000" class="form-control" id="printQuantity1" name="printQuantity1">
                </div>
                <div class="col">
                    <input type="text" value="1" class="form-control" id="printQuantity2" name="printQuantity2">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Material*gram weight:</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" id="Material1" name="material1">
                            <option selected value="14">C2S</option>
                            <option value="16">SBS</option>
                            <option value="15">Wooden free paper</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" id="Material2" name="material2">
                            <option selected value="102">250</option>
                            <option value="11">200</option>
                            <option value="111">157</option>
                            <option value="103">300</option>
                            <option value="14">350</option>
                            <option value="9">128</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="sel1">Printing color (front*reverse):</label>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" id="face_paper_color1" name="printColor1">
                            <option value="7">color</option>
                            <option value="8">Single black</option>
                            <option value="9">Double spot color</option>
                            <option value="10">Single spot color</option>
                            <option value="12">Color+1 Special</option>
                            <option value="13">Color+2 Special</option>
                            <option value="14">Color+glazing</option>
                            <option value="15">Glazing</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select class="form-control" id="face_paper_color2" name="printColor2">
                            <option value="7">color</option>
                            <option value="8">Single black</option>
                            <option value="9">Double spot color</option>
                            <option value="10">Single spot color</option>
                            <option value="12">Color+1 Special</option>
                            <option value="13">Color+2 Special</option>
                            <option value="14">Color+glazing</option>
                            <option value="15">Glazing</option>
                            <option value="0">no</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h3>Binding</h3>
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Lamination" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="Lamination" id="Lamination" value="1">
                        <label class="custom-control-label" for="Lamination">Lamination</label>
                    </div>
                    <div id="tempLamination" style="display: none">
                        <select name="selLamination1" id="selLamination1" class="form-control float-left w-47">
                            <option value="single">single side</option>
                            <option value="double">double side</option>
                        </select>
                        <select name="selLamination2" id="selLamination2" class="form-control float-right w-47">
                            <option value="亮膜">GlossLamination</option>
                            <option value="哑膜">MattLamination</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="LinenTexture" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="LinenTexture" value="1" id="LinenTexture">
                        <label class="custom-control-label" for="LinenTexture">Linen Texture</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Indentation" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="Indentation" value="1" id="Indentation">
                        <label class="custom-control-label" for="Indentation">Indentation</label>
                    </div>
                    <div id="tempIndentation" style="display: none">
                        <select name="selIndentation1" id="selIndentation1" class="form-control float-left w-47">
                            <option value="普通尼龙绳">Not folded</option>
                            <option value="加粗三股绳">Folded</option>
                        </select>
                        <select name="selIndentation2" id="selIndentation2" class="form-control float-right w-47">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Easytearline" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="Easytearline" id="Easytearline" value="1">
                        <label class="custom-control-label" for="Easytearline">Easy tear line</label>
                    </div>
                    <div id="tempEasytearline" style="display: none">
                        <select name="selEasytearline" id="selEasytearline" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="StampingSliver" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="StampingSliver" value="1" id="StampingSliver">
                        <label class="custom-control-label" for="StampingSliver">Foil Stamping(silver)</label>
                    </div>
                    <div id="tempStampingSliver" style="display: none">
                        <input type="text" placeholder="L(mm)" name="StampingSliverL" id="StampingSliverL" class="form-control float-left w-47">
                        <span style="font-size:25px;">×</span>
                        <input type="text" placeholder="W(mm)" name="StampingSliverW" id="StampingSliverW" class="form-control float-right w-47">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="StampingGold" value="0"/>
                        <input type="checkbox" class="custom-control-input" value="1" name="StampingGold" id="StampingGold">
                        <label class="custom-control-label" for="StampingGold">Foil Stamping(gold)</label>
                    </div>
                    <div id="tempStampingGold" style="display: none">
                        <input type="text" placeholder="L(mm)" name="StampingGoldL" id="StampingGoldL" class="form-control float-left w-47">
                        <span style="font-size:25px;">×</span>
                        <input type="text" placeholder="W(mm)" name="StampingGoldW" id="StampingGoldW" class="form-control float-right w-47">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Code" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="Code" value="1" id="Code">
                        <label class="custom-control-label" for="Code">Code</label>
                    </div>
                    <div id="tempCode" style="display: none">
                        <select name="selCode1" id="selCode1" class="form-control float-left w-47">
                            <option value="激光码">Bar code</option>
                            <option value="加字母码">QR code</option>
                        </select>
                        <select name="selCode2" id="selCode2" class="form-control float-right w-47">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="PunchHole" value="0"/>
                        <input type="checkbox" class="custom-control-input" value="1" name="PunchHole" id="PunchHole">
                        <label class="custom-control-label" for="PunchHole">Punch Hole</label>
                    </div>
                    <div id="tempPunchHole" style="display: none">
                        <select name="selPunchHole" id="selPunchHole" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="Embossed" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="Embossed" value="1" id="Embossed">
                        <label class="custom-control-label" for="Embossed">Embossed</label>
                    </div>
                    <div id="tempEmbossed" style="display: none">
                        <input type="text" name="EmbossedL" id="EmbossedL" placeholder="L(mm)" class="form-control float-left w-47">
                        <span style="font-size:25px;">×</span>
                        <input type="text" name="EmbossedW" id="EmbossedW" placeholder="W(mm)" class="form-control float-right w-47">
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="custom-control custom-checkbox">
                        <input type="hidden" name="SpotUV" value="0"/>
                        <input type="checkbox" class="custom-control-input" name="SpotUV" value="1" id="SpotUV">
                        <label class="custom-control-label" for="SpotUV">SpotUV</label>
                    </div>
                    <div id="tempSpotUV" style="display: none">
                        <div class="row">
                            <select name="selSpotUV1" id="selSpotUV1" class="form-control float-left w-47">
                                <option value="亮光油">gloss varnishing</option>
                            </select>
                            <select name="selSpotUV2" id="selSpotUV2" class="form-control float-right w-47">
                                <option value="单面">single side</option>
                                <option value="双面">double side</option>
                            </select>
                        </div>
                        
                        <div class="row mt-3">
                            <input name="SpotUVL" id="SpotUVL" type="text" placeholder="L(mm)" class="form-control float-left w-47">
                            <span style="font-size:25px;">×</span>
                            <input type="text" name="SpotUVW" id="SpotUVW" placeholder="W(mm)" class="form-control float-right w-47">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    
                </div>
            </div>
        </div>
        <button id="submit" type="submit" class="btn btn-primary mt-3">Self quotation</button>
    </div>
</form>
<div class="mt-3 container-fluid" id="ajaxdata"></div>
<script>
    $('#Material1').on('change', function() {
        $("#Material2 option").remove()
        switch(this.value){
            case '14':
                var html=''
                html +="<option value='102'>250</option>"
                html +="<option value='11'>200</option>"
                html +="<option value='111'>157</option>"
                html +="<option value='103'>300</option>"
                html +="<option value='14'>350</option>"
                html +="<option value='9'>128</option>"
                $('#Material2').html(html);
                break;
            case '16':
                var html=''
                html +="<option value='114'>210</option>"
                html +="<option value='115'>230</option>"
                html +="<option value='116'>250</option>"
                html +="<option value='117'>300</option>"
                html +="<option value='26'>350</option>"
                $('#Material2').html(html);
                break;
            case '15':
                var html=''
                html +="<option value='16'>100</option>"
                html +="<option value='17'>120</option>"
                html +="<option value='19'>140</option>"
                html +="<option value='113'>180</option>"
                $('#Material2').html(html);
                break;
            
            default:
                break
        }
    });
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault()
        // alert('prevent');
        $.ajax({
            url: '{{ route("postdiaopai") }}',
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
                let print_quantity = $('#printQuantity1').val();
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

    $("#Indentation").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempIndentation").css("display",'block')
            // $("#Handle").prop("checked",false);
        }else{
            console.log('unchecked')
            $("#tempIndentation").css("display",'none')
            
        }
    })

    $("#Easytearline").change(function(){
        if(this.checked){
            // $("#HandRope").prop("checked",false);
            $("#tempEasytearline").css("display",'block')
        }else{
            $("#tempEasytearline").css("display",'none')
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

    $("#Code").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempCode").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempCode").css("display",'none')
        }
    })

    $("#PunchHole").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempPunchHole").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempPunchHole").css("display",'none')
        }
    })

    $("#Embossed").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempEmbossed").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempEmbossed").css("display",'none')
        }
    })

    $("#SpotUV").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempSpotUV").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempSpotUV").css("display",'none')
        }
    })
</script>
@endsection