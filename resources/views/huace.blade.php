@extends('layouts.package')
@section('content')
<div class="container">
    <form action="">
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
                <input type="text" value="285" class="form-control" id="productSize2" name="productSize2">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="sel1"> Expanded size (mm):</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" value="420" class="form-control" id="printQuantity1" name="printQuantity1" readonly>
            </div>
            <div class="col">
                <input type="text" value="285" class="form-control" id="printQuantity2" name="printQuantity2" readonly>
            </div>
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
        <button id="submit" type="submit" class="btn btn-primary mt-3">Self quotation</button>
    </form>
    <div class="mt-3 container-fluid" id="ajaxdata"></div>
</div>
<script>
    $("#productSize1").change(function(){
        $('#printQuantity1').val($( this ).val()*2)
    })
    $("#productSize2").change(function(){
        $('#printQuantity2').val($( this ).val())
    })
    
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault()
        // alert('prevent');
        $.ajax({
            url: '{{ route("posthuace") }}',
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
</script>
@endsection