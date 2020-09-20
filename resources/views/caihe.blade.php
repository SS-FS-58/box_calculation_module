@extends('layouts.package')
@section('content')
<form action="">
<div class="container-fluid row mt-3">
    <div class="col-lg-6">
        <h3>Self quotation</h3>
        <div class="form-group">
            <select class="form-control" id="packageType" name="packageType">
                <option selected value="1">Siamese display box</option>
                <option value="2">Insert the bottom box under the upper cover</option>
                <option value="3">Upper and lower cover (shirt box)</option>
                <option value="4">Hook bottom box</option>
                <option value="5">Hanging box</option>
                <option value="6">Self-forming box</option>
                <option value="7">Insert bottom box up and down</option>
            </select>
        </div>
        <div class="row">
            <div class="col">
                <label for="sel1">Finished product size length * width * height (mm):</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" value="80" class="form-control" id="productSize1" name="productSize1">
            </div>
            <div class="col">
                <input type="text" value="40" class="form-control" id="productSize2" name="productSize2">
            </div>
            <div class="col">
                <input type="text" value="120" class="form-control" id="productSize3" name="productSize3">
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
                        <option selected value="16">SBS</option>
                        <option value="17">Kraft Paper</option>
                        <option value="14">C2S</option>
                        <option value="278">CCNB</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <select class="form-control" id="Material2" name="material2">
                        <option value="115">230</option>
                        <option value="116">250</option>
                        <option selected value="117">300</option>
                        <option value="26">350</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="sel1">Printing color:</label>
            </div>
        </div>
        <div class="form-group">
            <select class="form-control" id="printColor1" name="printColor1">
                <option value="7">color</option>
                <option value="8">Single black</option>
                <option value="9">Double spot color</option>
                <option value="10">SIngle spot color</option>
                <option value="12">Color+1Special</option>
                <option value="13">Color+2Special</option>
                <option value="14">Color+glazing</option>
                <option value="15">Glazing</option>
            </select>
        </div>
        
    </div>
    <div class="col-lg-6">
        <h3>Binding</h3>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="Formedabox" value="0"/>
                    <input type="checkbox" checked class="custom-control-input" name="Formedabox" id="Formedabox" value="1">
                    <label class="custom-control-label" for="Formedabox">Formed a box</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="Lamination" value="0"/>
                    <input type="checkbox" class="custom-control-input" name="Lamination" id="Lamination" value="1">
                    <label class="custom-control-label" for="Lamination">Lamination</label>
                </div>
                <select name="selLamination1" id="selLamination1" style="display:none" class="form-control float-left w-47">
                    <option value="单面覆膜">Lamination</option>
                </select>
                <select name="selLamination2" id="selLamination2" style="display:none" class="form-control float-right w-47">
                    <option value="亮膜">GlossLamination</option>
                    <option value="哑膜">MattLamination</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="HandRope" value="0"/>
                    <input type="checkbox" class="custom-control-input" name="HandRope" id="HandRope" value="1">
                    <label class="custom-control-label" for="HandRope">Hand Rope</label>
                </div>
                <select name="selHandRope" id="selHandRope" style="display:none" class="form-control">
                    <option value="普通尼龙绳">Ordinary Nylon Rope</option>
                    <option value="加粗三股绳">Bold Three-strand Rope</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="Handle" value="0"/>
                    <input type="checkbox" class="custom-control-input" name="Handle" id="Handle" value="1">
                    <label class="custom-control-label" for="Handle">Handle</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="StampingSliver" value="0"/>
                    <input type="checkbox" class="custom-control-input" name="StampingSliver" value="1" id="StampingSliver">
                    <label class="custom-control-label" for="StampingSliver">Foil Stamping(sliver)</label>
                </div>
                <div id="tempStampingSliver" style="display: none">
                    <input type="text" id="StampingSliverL" name="StampingSliverL" placeholder="L(mm)" class="form-control float-left w-47">
                    <span style="font-size:25px;">×</span>
                    <input type="text" id="StampingSliverW" name="StampingSliverW" placeholder="W(mm)" class="form-control float-right w-47">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="StampingGold" value="0"/>
                    <input type="checkbox" class="custom-control-input" value="1" name="StampingGold" id="StampingGold">
                    <label class="custom-control-label" for="StampingGold">Foil Stamping(gold)</label>
                </div>
                <div id="tempStampingGold" style="display: none">
                    <input type="text" id="StampingGoldL" name="StampingGoldL" placeholder="L(mm)" class="form-control float-left w-47">
                    <span style="font-size:25px;">×</span>
                    <input type="text" id="StampingGoldW" name="StampingGoldW" placeholder="W(mm)" class="form-control float-right w-47">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="PVCWindows" value="0"/>
                    <input type="checkbox" class="custom-control-input" value="1" name="PVCWindows" id="PVCWindows">
                    <label class="custom-control-label" for="PVCWindows">PVC Windows</label>
                </div>
                <div id="tempPVCWindows" style="display: none">
                    <input type="text" id="PVCWindowsL" name="PVCWindowsL" placeholder="L(mm)" class="form-control float-left w-47">
                    <span style="font-size:25px;">×</span>
                    <input type="text" id="PVCWindowsW" name="PVCWindowsW" placeholder="W(mm)" class="form-control float-right w-47">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="Embossed" value="0"/>
                    <input type="checkbox" class="custom-control-input" value="1" name="Embossed" id="Embossed">
                    <label class="custom-control-label" for="Embossed">Embossed</label>
                </div>
                <div id="tempEmbossed" style="display: none">
                    <input type="text" id="EmbossedL" name="EmbossedL" placeholder="L(mm)" class="form-control float-left w-47">
                    <span style="font-size:25px;">×</span>
                    <input type="text" id="EmbossedW" name="EmbossedW" placeholder="W(mm)" class="form-control float-right w-47">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="SpotUV" value="0"/>
                    <input type="checkbox" class="custom-control-input" name="SpotUV" value="1" id="SpotUV">
                    <label class="custom-control-label" for="SpotUV">Spot UV</label>
                </div>
                <div id="tempSpotUV" style="display: none">
                    <select name="selSpotUV1" id="selSpotUV1" class="form-control">
                        <option value="亮光油">gloss varnishing</option>
                    </select>
                    <br>
                    <input type="text" id="SpotUVL" name="SpotUVL" placeholder="L(mm)" class="form-control float-left w-47">
                    <span style="font-size:25px;">×</span>
                    <input type="text" id="SpotUVW" name="SpotUVW" placeholder="W(mm)" class="form-control float-right w-47">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="Varnishing" value="0"/>
                    <input type="checkbox" class="custom-control-input" value="1" name="Varnishing" id="Varnishing">
                    <label class="custom-control-label" for="Varnishing">Varnishing</label>
                </div>
                <select name="selVarnishing" id="selVarnishing" style="display: none" class="form-control float-right w-100">
                    <option value="亮光油">gloss varnishing</option>
                    <option value="磨光油">matt varnishing</option>
                </select>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            </div>
        </div>
    </div>
    <button id="submit" type="submit" class="btn btn-primary mt-3">Self quotation</button>   
</div>
</form>
<div class="mt-3 container-fluaid" id="ajaxdata"></div>
<script>
    $('#Material1').on('change', function() {
        $("#Material2 option").remove()
        switch(this.value){
            case '16':
                var html=''
                html +="<option value='117'>300</option>"
                html +="<option value='116'>250</option>"
                html +="<option value='26'>350</option>"
                html +="<option value='115'>230</option>"
                $('#Material2').html(html);
                break;
            case '14':
                var html=''
                html +="<option value='103'>300</option>"
                html +="<option value='14'>350</option>"
                $('#Material2').html(html);
                break;
            case '17':
                var html=''
                html +="<option value='104'>300</option>"
                html +="<option value='166'>250</option>"
                html +="<option value='162'>200</option>"
                $('#Material2').html(html);
                break;
            case '278':
                var html=''
                html +="<option value='317'>300</option>"
                html +="<option value='316'>250</option>"
                html +="<option value='318'>350</option>"
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
            url: '{{ route("postcaihe") }}',
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
            $("#selLamination1").css("display",'block')
            $("#selLamination2").css("display",'block')
        }else{
            console.log('unchecked')
            $("#selLamination1").css("display",'none')
            $("#selLamination2").css("display",'none')
        }
    })

    $("#HandRope").change(function(){
        if(this.checked){
            console.log('checked')
            $("#selHandRope").css("display",'block')
            $("#Handle").prop("checked",false);
        }else{
            console.log('unchecked')
            $("#selHandRope").css("display",'none')
            
        }
    })

    $("#Handle").change(function(){
        if(this.checked){
            $("#HandRope").prop("checked",false);
            $("#selHandRope").css("display",'none')
        }else{
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

    $("#PVCWindows").change(function(){
        if(this.checked){
            console.log('checked')
            $("#tempPVCWindows").css("display",'block')
        }else{
            console.log('unchecked')
            $("#tempPVCWindows").css("display",'none')
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

    $("#Varnishing").change(function(){
        if(this.checked){
            console.log('checked')
            $("#selVarnishing").css("display",'block')
        }else{
            console.log('unchecked')
            $("#selVarnishing").css("display",'none')
        }
    })
</script>
@endsection