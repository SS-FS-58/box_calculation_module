@extends('layouts.package')
@section('content')

<!-- <div class="container"> -->
    <form action="/paperbox" method="post">
        @csrf
        <div class="container-fluid row m-0 p-0">
            <div class="col-lg-6">
                <h3>User setting</h3>
                <div class="row">
                    <div class="col">
                        <label for="sel1">Finished product size length * width * height (mm):</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" value="100" class="form-control" id="productSize1" name="productSize1">
                    </div>
                    <div class="col">
                        <input type="text" value="50" class="form-control" id="productSize2" name="productSize2">
                    </div>
                    <div class="col">
                        <input type="text" value="150" class="form-control" id="productSize3" name="productSize3">
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
                                <option value="230">230</option>
                                <option selected value="250">250</option>
                                <option value="300">300</option>
                                <option value="350">350</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4>Binding</h4>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="glossLamination_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="glossLamination_C" id="glossLamination_C" value="1">
                            <label class="custom-control-label" for="glossLamination_C">Gloss Lamination</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="mattLamination_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="mattLamination_C" id="mattLamination_C" value="1">
                            <label class="custom-control-label" for="mattLamination_C">Matt Lamination</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="aqueousVarnishing_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="aqueousVarnishing_C" id="aqueousVarnishing_C" value="1">
                            <label class="custom-control-label" for="aqueousVarnishing_C">Aqueous Varnishing</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="uvCoating_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="uvCoating_C" id="uvCoating_C" value="1">
                            <label class="custom-control-label" for="uvCoating_C">UV coating RMB</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="dieCut_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="dieCut_C" id="dieCut_C" value="1">
                            <label class="custom-control-label" for="dieCut_C">Die cut RMB</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="spotUV_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="spotUV_C" id="spotUV_C" value="1">
                            <label class="custom-control-label" for="spotUV_C">Spot UV RMB</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="embossDebossed_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="embossDebossed_C" id="embossDebossed_C" value="1">
                            <label class="custom-control-label" for="embossDebossed_C">Emboss Debossed</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="texturedEffect_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="texturedEffect_C" id="texturedEffect_C" value="1">
                            <label class="custom-control-label" for="texturedEffect_C">Textured Effect</label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="custom-control custom-checkbox">
                            <input type="hidden" name="foilStamping_C" value="0"/>
                            <input type="checkbox" class="custom-control-input" name="foilStamping_C" id="foilStamping_C" value="1">
                            <label class="custom-control-label" for="foilStamping_C">Foil Stamping</label>
                        </div>
                    </div>
                </div>
                <button id="submit" type="submit" class="btn btn-primary mt-3">Self quotation</button> 
            </div>
            <div class="col-lg-6 row" >
                <div class="col-12">
                    <h3>Backdesk setting</h3>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">glued Size (mm):</label>
                        </div>
                        <div class="col">
                            <label for="sel1">flap Size (mm):</label>
                        </div>
                        <div class="col">
                            <label for="sel1">bleed Size (mm):</label>
                        </div>
                        <div class="col">
                            <label for="sel1">fixed Size (mm):</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="15" class="form-control" id="gluedSize" name="gluedSize">
                        </div>
                        <div class="col">
                            <input type="text" value="15" class="form-control" id="flapSize" name="flapSize">
                        </div>
                        <div class="col">
                            <input type="text" value="3" class="form-control" id="bleedSize" name="bleedSize">
                        </div>
                        <div class="col">
                            <input type="text" value="10" class="form-control" id="fixedSize" name="fixedSize">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">Print plate 1 paper size (mm * mm):</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Print plate 2 paper size (mm * mm):</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="889" class="form-control" id="print1PaperSizeW" name="print1PaperSizeW">
                        </div>
                        <div class="col">
                            <input type="text" value="700" class="form-control" id="print1PaperSizeH" name="print1PaperSizeH">
                        </div>
                        <div class="col">
                            <input type="text" value="787" class="form-control" id="print2PaperSizeW" name="print2PaperSizeW">
                        </div>
                        <div class="col">
                            <input type="text" value="700" class="form-control" id="print2PaperSizeH" name="print2PaperSizeH">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">If smaller than 5000: Paper wastage Number:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Paper cost (yuan):</label>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="300" class="form-control" id="paperwastageNumber" name="paperwastageNumber">
                        </div>
                        <div class="col">
                            <input type="text" value="7" class="form-control" id="paperCost" name="paperCost">
                        </div>
                    </div>
                    <h4>Printing Setting</h4>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">Below 3000 Price RMB:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Per 1000 added Price RMB: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="600" class="form-control" id="pintingbelow3000" name="pintingbelow3000">
                        </div>
                        <div class="col">
                            <input type="text" value="100" class="form-control" id="printingper1000" name="printingper1000">
                        </div>
                    </div>
                    <h4>Binding Setting</h4>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">Gloss Lamination RMB:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Matt Lamination RMB: </label>
                        </div>
                        <div class="col">
                            <label for="sel1">Aqueous Varnishing RMB: </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="0.60" class="form-control" id="glossLamination" name="glossLamination">
                        </div>
                        <div class="col">
                            <input type="text" value="0.60" class="form-control" id="mattLamination" name="mattLamination">
                        </div>
                        <div class="col">
                            <input type="text" value="0.30" class="form-control" id="aqueousVarnishing" name="aqueousVarnishing">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">UV coating RMB:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Die cut RMB:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Spot UV RMB:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="0.60" class="form-control" id="uvCoating" name="uvCoating">
                        </div>
                        <div class="col">
                            <input type="text" value="0.10" class="form-control" id="dieCut" name="dieCut">
                        </div>
                        <div class="col">
                            <input type="text" value="0.10" class="form-control" id="spotUV" name="spotUV">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="sel1">Emboss Debossed:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Textured Effect:</label>
                        </div>
                        <div class="col">
                            <label for="sel1">Foil Stamping:</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="text" value="0.10" class="form-control" id="embossDebossed" name="embossDebossed">
                        </div>
                        <div class="col">
                            <input type="text" value="0.60" class="form-control" id="texturedEffect" name="texturedEffect">
                        </div>
                        <div class="col">
                            <input type="text" value="0.10" class="form-control" id="foilStamping" name="foilStamping">
                        </div>
                    </div>
                </div>
                <button id="save" type="button" class="btn btn-primary mt-3">save</button> 
                <button id="load" type="button" class="btn btn-primary mt-3">Load</button>
            </div>
        </div>
    </form>
    <div class="mt-3" id="ajaxdata"></div>
<!-- </div> -->
<script>
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault()
        $.ajax({
            url: '{{ route("postpaperbox") }}',
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
                console.log('data',data);
                let print_quantity = $('#printQuantity1').val();
                // debugger;
                if(data.success == false){
                    html = `
                        <div class='row container-fluid  mx-auto'>
                            
                            <div class="formula-area col-6">
                                <p style="font-size:1.2rem; font-weight:bold;">` + "Size error" + `</p>
                            </div>
                        </div>
                        `;
                }
                else{
                    html = `
                        <div class='row container-fluid  mx-auto'>
                            
                            <div class="formula-area col-6">
                                <p style="font-size:1.2rem; font-weight:bold;">` + data + `</p>
                            </div>
                        </div>
                        `;
                }
                html = `
                    <div class='row container-fluid  mx-auto'>
                        
                        <div class="formula-area col-6">
                            <p style="font-size:1.2rem; font-weight:bold;">` + data + `</p>
                        </div>
                    </div>
                    `;
                $('#ajaxdata').html(html);
                // displayresponse(data);                
            }
        });
        // }
    });
    $( "#save" ).click(function() {
        event.preventDefault()
        $.ajax({
            url: '{{ route("postpaperboxsettings") }}',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function()
            {
                $(".loader").css("display","flex");
            },
            success:function(data)
            {
                $(".loader").css("display","none");
                console.log('data',data);
                let print_quantity = $('#printQuantity1').val();
                if(data.success == false){
                    html = `
                        <div class='row container-fluid  mx-auto'>
                            
                            <div class="formula-area col-6">
                                <p style="font-size:1.2rem; font-weight:bold;">` + "Size error" + `</p>
                            </div>
                        </div>
                        `;
                }
                else{
                    html = `
                        <div class='row container-fluid  mx-auto'>
                            
                            <div class="formula-area col-6">
                                <p style="font-size:1.2rem; font-weight:bold;">` + data + `</p>
                            </div>
                        </div>
                        `;
                }
                html = `
                    <div class='row container-fluid  mx-auto'>
                        
                        <div class="formula-area col-6">
                            <p style="font-size:1.2rem; font-weight:bold;">` + data + `</p>
                        </div>
                    </div>
                    `;
                $('#ajaxdata').html(html);
                // displayresponse(data);                
            }
        });
        // }
    });
    
    
</script>
@endsection