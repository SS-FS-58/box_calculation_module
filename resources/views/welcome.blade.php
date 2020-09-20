@extends('layouts.package')
@section('content')
<div class="container">
  <form >
    @csrf
    <div class="row">
        <div class="col">
            <label for="sel1">Select list:</label>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control" id="package_type" name="package_type">
            <option selected value="上盖下插底盒">上盖下插底盒</option>
            <option value="手提箱">手提箱</option>
            <option value="提拔盒">提拔盒</option>
        </select>
    </div>
    <div class="row">
        <div class="col">
            <label for="sel1">成品尺寸(长*宽*高)：</label>
        </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" value="350" class="form-control" id="product_size1" name="product_size1">
      </div>
      <div class="col">
        <input type="text" value="260" class="form-control" id="product_size2" name="product_size2">
      </div>
      <div class="col">
        <input type="text" value="320" class="form-control" id="product_size3" name="product_size3">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="sel1">印刷数量*品种:</label>
        </div>
    </div>
    <div class="row">
      <div class="col">
        <input type="text" value="1000" class="form-control" id="print_quantity1" name="print_quantity1">
      </div>
      <div class="col">
        <input type="text" value="1" class="form-control" id="print_quantity2" name="print_quantity2">
      </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="sel1">面纸(材料*克重)：</label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="facial_paper1" name="facial_paper1">
                    <option value="灰底白板">灰底白板</option>
                    <option value="白卡纸">白卡纸</option>
                    <option value="牛皮纸">牛皮纸</option>
                    <option value="白牛皮">白牛皮</option>
                    <option value="铜版纸">铜版纸</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="facial_paper2" name="facial_paper2">
                    <option value="250">250</option>
                    <option value="300">300</option>
                    <option value="350">350</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="sel1">面纸颜色：</label>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control" id="face_paper_color" name="face_paper_color">
            <option value="彩色">彩色</option>
            <option value="单黑">单黑</option>
            <option value="双专色">双专色</option>
            <option value="单专色">单专色</option>
            <option value="彩色+1专">彩色+1专</option>
            <option value="彩色+2专">彩色+2专</option>
            <option value="彩色+上光">彩色+上光</option>
            <option value="上光">上光</option>
        </select>
    </div>
    
    <div class="row">
        <div class="col">
            <label for="sel1">大小面内容(大面*侧面)：</label>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="contents_face1" name="contents_face1">
                    <option value="双大面不同">双大面不同</option>
                    <option value="双大面相同">双大面相同</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <select class="form-control" id="contents_face2" name="contents_face2">
                    <option value="双侧面不同">双侧面不同</option>
                    <option value="双侧面相同">双侧面相同</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="sel1">瓦楞材料：</label>
        </div>
    </div>
    <div class="form-group">
        <select class="form-control" id="corrugated_material" name="corrugated_material">
            <option value="三层高强度瓦楞板">三层高强度瓦楞板</option>
            <option value="三层高强度瓦楞(内白)">三层高强度瓦楞(内白)</option>
            <option value="三层(普通)瓦楞板">三层(普通)瓦楞板</option>
            <option value="五层(普通)瓦楞纸板">五层(普通)瓦楞纸板</option>
        </select>
    </div>

    <button id="submit" type="submit" class="btn btn-primary mt-3">自助报价</button>[点击选择价格下单]

  </form>
  
  <div id='ajaxdata'>
    
  </div>
</div>
<script>
    $( "form" ).on( "submit", function( event ) {
        event.preventDefault()
        // alert('prevent');
        $.ajax({
            url: '{{ route("calculation") }}',
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

                const loader = document.querySelector(".loader");
                loader.style.zIndex = "-11";
                loader.className += " hidden";
                console.log('data',data.result[0].description);
                // debugger;
                html = "";
                html +="<div class='row'><textarea cols='50' rows='3'>" + data.result[0].description + "</textarea></div>";
                html +=" <div class='row'><table class='table table-bordered'><thead><tr><th>数量</th><th>足数(元)</th><th>含税</th></tr></thead><tbody>";
                let print_quantity = $('#print_quantity1').val();
                print_quantity_div = parseInt(print_quantity / 1000);
                print_quantity_rest = parseInt(print_quantity % 1000);
                html +="<tr><td>" + parseInt(print_quantity_rest + 1000*(print_quantity_div)) + "</td><td>"
                                 + data.result[0].full_amount_1000 + "</td><td>"
                                 + data.result[0].tax_included_1000 + "</td></tr><tr><td>"
                                 +parseInt(print_quantity_rest + 1000*(print_quantity_div+1)) + "</td><td>"
                                 + data.result[0].full_amount_2000 + "</td><td>"
                                 + data.result[0].tax_included_2000 + "</td></tr><tr><td>"
                                 + parseInt(print_quantity_rest + 1000*(print_quantity_div+2)) + "</td><td>"
                                 + data.result[0].full_amount_3000 + "</td><td>"
                                 + data.result[0].tax_included_3000 + "</td></tr><tr><td>"
                                 + parseInt(print_quantity_rest + 1000*(print_quantity_div+3)) + "</td><td>"
                                 + data.result[0].full_amount_4000+ "</td><td>"
                                 + data.result[0].tax_included_4000+ "</td></tr><tr><td>"
                                 + parseInt(print_quantity_rest + 1000*(print_quantity_div+4))+ "</td><td>"
                                 + data.result[0].full_amount_5000+ "</td><td>"
                                 + data.result[0].tax_included_5000+ "</td></tr></tbody></table></div>"
                console.log(html);
                $('#ajaxdata').html(html);
            }
        });
    });
</script>
@endsection