
@extends('layouts.package')
@section('content')
<div class="container mt-3">
    <form action="/userbubble" method="post">
        @csrf
        <h3>Self quotation</h3>
        <div class="row">
            <div class="col">
                <label for="sel1">Finished product size Width * Height (mm * mm):</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" value="253" class="form-control" id="productSize1" name="productSize1">
            </div>
            <div class="col">
                <input type="text" value="330" class="form-control" id="productSize2" name="productSize2">
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col">
                <label for="sel1">Length of the seal (mm):</label>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <input type="text" value="80" class="" id="productSize3" name="productSize3">
            </div>
        </div>
        <hr />
        {{-- <div class="row">
            <div class="col">
                <label for="sel1">Material</label>
            </div>
        </div> --}}
        <div class="row mt-3">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label for="sel1">Type:</label>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" id="materialType" name="materialType">
                        <option value="0">LDPE</option>
                        <option value="1">HOPE</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label for="sel1">Thickness:</label>
                    </div>
                </div>
                <div class="form-group">
                    <select class="form-control" id="thickness" name="thickness">
                        <option value="0.05">Single Layer 0.05mm(2mil)</option>
                        <option value="0.06">Single Layer 0.06mm(2.4mil)</option>
                        <option value="0.07">Single Layer 0.07mm(2.8mil)</option>
                        <option value="0.08">Single Layer 0.08mm(3.2mil)</option>
                        <option value="0.12">Single Layer 0.12mm(4.8mil)</option>
                    </select>
                </div>
            </div>
        </div>

        <hr />

        <div class="row mt-3">
            <div class="col">
                <label for="sel1">Printing Type:</label>
            </div>
        </div>
        <div class="form-group">
            <select class="form-control" id="printingType" name="printingType">
                <option selected value="1">1C</option>
                <option value="2">2C</option>
                <option value="3">3C</option>
                <option value="4">4C</option>
                <option value="5">5C</option>
            </select>
        </div>

        <hr />

        <div class="row">
            <div class="col">
                <div class="row mt-3">
                    <div class="col">
                        <label for="sel1">Quantity</label>
                    </div>
                </div>
                <input type="text" value="1000" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="col">
                <div class="row mt-3">
                    <div class="col">
                        <label for="sel1">CurrencyType</label>
                    </div>
                </div>
                <select class="form-control" id="currencyType" name="currencyType">
                    <option selected value="1">Yuan</option>
                    <option value="2">USD</option>
                    <option value="3">Euro</option>
                    <option value="4">Pound</option>
                </select>
            </div>
        </div>

        <button id="submit" type="submit" class="btn btn-primary mt-3">Self quotation</button>
    </form>
    <div class="mt-3" id="ajaxdata"></div>
</div>
<script>
    
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault()
        // alert('prevent');
        $.ajax({
            url: '{{ route("postuserpoly") }}',
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
                html +=" <div class='row'><table class='table table-bordered'><thead><tr><th>Quantity</th><th>Full amount (yuan)</th></tr></thead><tbody>";
                let print_quantity = $('#quantity').val();
                html +="<tr><td>" + parseInt(print_quantity) + "</td><td>"
                                 + data+ "</td>"
                console.log(html);
                $('#ajaxdata').html(html);
            }
        });
    });
</script>
@endsection