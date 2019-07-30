<?php
//print_r($data);die;



?>
<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Sản phẩm</th>
                      <th>Tên SP</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Tổng tiền</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data->items as $idSP => $sp) : ?>
                    <tr id="cart-row-<?= $idSP ?>">
                      <td class="cart_product">
                        <a href="#">
                          <img src="public/source/images/products/<?= $sp['item']->image ?>" alt="Product">
                        </a>
                      </td>
                      <td class="cart_description"><p class="product-name">
                        <a href="#"><?= $sp['item']->name ?></a></p>
                      </td>
                      <td class="price">
                        <?php if ($sp['item']->promotion_price != $sp['item']->value) : ?>
                          <span><?= number_format($sp['item']->promotion_price) ?> vnđ</span>
                          <br>
                          <del style="color:darkgrey"><?= number_format($sp['item']->value) ?> vnđ</del>
                        <?php else : ?>
                          <span><?= number_format($sp['item']->value) ?> vnđ</span>
                        <?php endif ?>
                      </td>
                      <td class="qty">
                        <input id-sp="<?= $idSP ?>" class="form-control input-sm" type="text" value="<?= $sp['qty'] ?>">
                      </td>
                      <td class="price">
                        <span id="discountPrice-<?= $idSP ?>"><?= number_format($sp['discountPrice']) ?> vnđ</span>
                      </td>
                      <td class="action">
                        <a style="cursor: pointer;" class="remove-item-cart" id-sp="<?= $idSP ?>"><i class="icon-close"></i></a></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Đơn giá gốc (chưa khuyến mãi)</td>
                      <td colspan="2" class="totalPrice"><?= number_format($data->totalPrice) ?> vnđ</td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Tổng thanh toán</strong></td>
                      <td colspan="2"><strong class="promtPrice"><?= number_format($data->promtPrice) ?> vnđ</strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> 
                <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua sắm</a> 
                <a class="checkout-btn" href="checkout.php"><i class="fa fa-check"></i> Đặt hàng </a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- jquery js -->
  <script type="text/javascript" src="public/source/js/jquery.min.js"></script>
<script>

  $(document).ready(function(){
    $('.remove-item-cart').click(function(){
      var idSP = $(this).attr('id-sp');
      $.ajax({
        url: "cart.php",
        type: "POST",
        data:{
          id:idSP,
          action: "delete"
        },
        dataType: "JSON",
        success:function(res){
          $('#cart-row-'+idSP).hide(500)
          //res = JSON.parse(res)
          $('.promtPrice').html(res.promtPrice + ' vnđ')          
          $('.totalPrice').html(res.totalPrice + ' vnđ')
          $( "#shoppingcart-inner" ).load(window.location.href + " #shoppingcart-inner" );
        },
        error:function(){
          console.log('errrrr')
        }
      })
    })

    var timer;
		$('.input-sm').keyup(function() {
			window.clearTimeout(timer);
      var soluong = $(this).val();  
      if(isNaN(soluong)){
        alert("Nhập số")
        $(this).val('')
        $(this).focus()
        return;
      }else if(soluong==0){
        alert("Nhập số lớn hơn 0")
        $(this).val('')
        $(this).focus()
        return;
      }
      var idSP = $(this).attr('id-sp')
       clearTimeout(timer);
      timer = window.setTimeout(function(){
        // console.log(soluong)
        // console.log( idSP)
        $.ajax({
          url: "cart.php",
          type: "POST",
          data:{
            qty: soluong,
            id:idSP,  
            action: "update"
          },
          dataType:"JSON",
          success:function(res){
            console.log(res)
            $('#discountPrice-'+idSP).html(res.discountPrice + ' vnđ')
            $('.promtPrice').html(res.promtPrice + ' vnđ')          
            $('.totalPrice').html(res.totalPrice + ' vnđ')
            $( "#shoppingcart-inner" ).load(window.location.href + " #shoppingcart-inner" );
          }
        })
			},500);
		})
  })

</script>