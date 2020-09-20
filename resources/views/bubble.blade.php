@extends('layouts.package')
@section('content')
<div class="container mt-3">

    <form action="/bubble" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <label for="sel1">Materials Price per square (yuan):</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Currency</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Kraft Bubble Mailer Bag</td>
                        <td><input type="text" value="@if(isset($data->matPrice1)){{$data->matPrice1}}@endif" id="matPrice1" name="matPrice1"></td>
                        <td><input type="text" value="@if(isset($data->matCur1)){{$data->matCur1}}@endif" id="matCur1" name="matCur1"></td>
                      </tr>
                      <tr>
                        <td>Non-foaming Co-extruded Bubble Mailer Bag</td>
                        <td><input type="text" value="@if(isset($data->matPrice2)){{$data->matPrice2}}@endif" id="matPrice2" name="matPrice2"></td>
                        <td><input type="text" value="@if(isset($data->matCur2)){{$data->matCur2}}@endif" id="matCur2" name="matCur2"></td>
                      </tr>
                      <tr>
                        <td>Non-foaming Pearlescent Bubble Mailer Bag</td>
                        <td><input type="text" value="@if(isset($data->matPrice3)){{$data->matPrice3}}@endif" id="matPrice3" name="matPrice3"></td>
                        <td><input type="text" value="@if(isset($data->matCur3)){{$data->matCur3}}@endif" id="matCur3" name="matCur3"></td>
                      </tr>
                      <tr>
                        <td>Foaming Co-extruded Bubble Mailer Bag</td>
                        <td><input type="text" value="@if(isset($data->matPrice4)){{$data->matPrice4}}@endif" id="matPrice4" name="matPrice4"></td>
                        <td><input type="text" value="@if(isset($data->matCur4)){{$data->matCur4}}@endif" id="matCur4" name="matCur4"></td>
                      </tr>
                      <tr>
                        <td>Foaming Parlescent Matt Bubble Mailer Bag</td>
                        <td><input type="text" value="@if(isset($data->matPrice5)){{$data->matPrice5}}@endif" id="matPrice5" name="matPrice5"></td>
                        <td><input type="text" value="@if(isset($data->matCur5)){{$data->matCur5}}@endif" id="matCur5" name="matCur5"></td>
                      </tr>
                      <tr>
                        <td>Foaming Parlescent Bubble Mailer Bag</td>
                        <td><input type="text" value="@if(isset($data->matPrice6)){{$data->matPrice6}}@endif" id="matPrice6" name="matPrice6"></td>
                        <td><input type="text" value="@if(isset($data->matCur6)){{$data->matCur6}}@endif" id="matCur6" name="matCur6"></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <label for="sel1">Printing Price per square (yuan):</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Currency</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1C</td>
                        <td><input type="text" value="@if(isset($data->printingFee1)){{$data->printingFee1}}@endif" id="printingFee1" name="printingFee1"></td>
                        <td><input type="text" value="@if(isset($data->printigCur1)){{$data->printigCur1}}@endif" id="printigCur1" name="printigCur1"></td>
                      </tr>
                      <tr>
                        <td>2C</td>
                        <td><input type="text" value="@if(isset($data->printingFee2)){{$data->printingFee2}}@endif" id="printingFee2" name="printingFee2"></td>
                        <td><input type="text" value="@if(isset($data->printigCur2)){{$data->printigCur2}}@endif" id="printigCur2" name="printigCur2"></td>
                      </tr>
                      <tr>
                        <td>3C</td>
                        <td><input type="text" value="@if(isset($data->printingFee3)){{$data->printingFee3}}@endif" id="printingFee3" name="printingFee3"></td>
                        <td><input type="text" value="@if(isset($data->printigCur3)){{$data->printigCur3}}@endif" id="printigCur3" name="printigCur3"></td>
                      </tr>
                      <tr>
                        <td>4C</td>
                        <td><input type="text" value="@if(isset($data->printingFee4)){{$data->printingFee4}}@endif" id="printingFee4" name="printingFee4"></td>
                        <td><input type="text" value="@if(isset($data->printigCur4)){{$data->printigCur4}}@endif" id="printigCur4" name="printigCur4"></td>
                      </tr>
                      <tr>
                        <td>5C</td>
                        <td><input type="text" value="@if(isset($data->printingFee5)){{$data->printingFee5}}@endif" id="printingFee5" name="printingFee5"></td>
                        <td><input type="text" value="@if(isset($data->printigCur5)){{$data->printigCur5}}@endif" id="printigCur5" name="printigCur5"></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>

        <div class="row">
            <div class="col mt-2">
                <label for="sel1">Other:</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col mt-2">
                        <label for="sel1">Tax point:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" value="@if(isset($data->taxPoint)){{$data->taxPoint}}@endif" id="taxPoint" name="taxPoint">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col mt-2">
                        <label for="sel1">Profit</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control"  value="@if(isset($data->profit)){{$data->profit}}@endif" id="profit" name="profit">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col mt-2">
                <label for="sel1">Currency Rate(1 Yean):</label>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="text" class="" value="@if(isset($data->usdCur)){{$data->usdCur}}@endif" id="usdCur" name="usdCur">
                <label for="sel1">USD</label>
            </div>
            <div class="col">
                <input type="text" class=""  value="@if(isset($data->euroCur)){{$data->euroCur}}@endif" id="euroCur" name="euroCur">
                <label for="sel1">EURO</label>
            </div>
            <div class="col">
                <input type="text" class=""  value="@if(isset($data->poundCur)){{$data->poundCur}}@endif" id="poundCur" name="poundCur">
                <label for="sel1">POUND</label>
            </div>
        </div>
        <button id="submit" type="submit" class="btn btn-primary mt-3">Save</button>
        <button id="reset" type="button" class="btn btn-primary mt-3">Reset</button>
    </form>
</div>
<script>
    
    $( "#reset" ).click(function(){
        event.preventDefault()
        // alert('prevent');
        $.ajax({
            url: '{{ route("postbubble") }}',
            method:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            // ContentType: "application/x-www-form-urlencoded; Charset=utf-8 ",
            data:{
                "matPrice1":3,
                "matPrice2":2.6,
                "matPrice3":2.4,
                "matPrice4":3.3,
                "matPrice5":2.8,
                "matPrice6":2.8,

                "matCur1":"YUAN",
                "matCur2":"YUAN",
                "matCur3":"YUAN",
                "matCur4":"YUAN",
                "matCur5":"YUAN",
                "matCur6":"YUAN",

                "printingFee1":0.07,
                "printingFee2":0.1,
                "printingFee3":0.14,
                "printingFee4":0.19,
                "printingFee5":0.25,

                "printigCur1":"YUAN",
                "printigCur2":"YUAN",
                "printigCur3":"YUAN",
                "printigCur4":"YUAN",
                "printigCur5":"YUAN",

                "taxPoint":1.13,
                "profit":1.05,

                "usdCur":0.14,
                "euroCur":0.12,
                "poundCur":0.11,
            },
            dataType:"json",
            beforeSend:function()
            {
                console.log('test')
                $("#matPrice1").val("3");
                $("#matPrice2").val("2.6");
                $("#matPrice3").val("2.4");
                $("#matPrice4").val("3.3");
                $("#matPrice5").val("2.8");
                $("#matPrice6").val("2.8");
                
                $("#matCur1").val("YUAN");
                $("#matCur2").val("YUAN");
                $("#matCur3").val("YUAN");
                $("#matCur4").val("YUAN");
                $("#matCur5").val("YUAN");
                $("#matCur6").val("YUAN");

                $("#printingFee1").val("0.07");
                $("#printingFee2").val("0.1");
                $("#printingFee3").val("0.14");
                $("#printingFee4").val("0.19");
                $("#printingFee5").val("0.25");

                $("#printigCur1").val("YUAN");
                $("#printigCur2").val("YUAN");
                $("#printigCur3").val("YUAN");
                $("#printigCur4").val("YUAN");
                $("#printigCur5").val("YUAN");

                $("#taxPoint").val(1.13);
                $("#profit").val(1.05);
                
                $("#usdCur").val(0.14);
                $("#euroCur").val(0.12);
                $("#poundCur").val(0.11);
            },
            success:function(data)
            {
                // location.reload();
                console.log('data',data);
                // debugger;
                
            }
        });
    });
</script>
@endsection