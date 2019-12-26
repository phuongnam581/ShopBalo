<?php
//print_r($data);die;
if(!isset($_SESSION)) session_start();


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
                        <a href="<?= $idSP ?>">
                          <img src="public/source/images/products/<?= $sp['item']->image ?>" alt="Product">
                        </a>
                      </td>
                      <td class="cart_description"><p class="product-name">
                        <a href="<?=$idSP?>"><?= $sp['item']->name ?></a></p>
                      </td>
                      <td class="price">
                        <?php if ($sp['item']->percent_sale != null) : ?>
                          <span><?=number_format($sp['item']->value - ($sp['item']->percent_sale * $sp['item']->value ),2)?> $</span>
                          <br>
                          <del style="color:darkgrey"><?= number_format($sp['item']->value,2) ?> $</del>
                        <?php else : ?>
                          <span><?= number_format($sp['item']->value,2) ?> $</span>
                        <?php endif ?>
                      </td>
                      <td class="qty">
                        <input id-sp="<?= $idSP ?>" class="input-sm" type="text" value="<?= $sp['qty'] ?>" readonly>             
                      </td>
                      <td class="price">
                         <span><?=number_format(($sp['item']->value - ($sp['item']->percent_sale * $sp['item']->value ))*$sp['qty'],2)?> $</span>
                          <br>
                          <?php if($sp['item']->percent_sale !=null):?>
                          <del style="color:darkgrey"><?= number_format(($sp['item']->value)*$sp['qty'],2) ?> $</del>
                          <?php endif?>
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
                      <td colspan="2" class="totalPrice"><?= number_format($data->totalPrice,2) ?> $</td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Tổng thanh toán</strong></td>
                      <td colspan="2"><strong class="promtPrice"><?= number_format($data->promtPrice,2) ?> $</strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> 
                <a class="continue-btn" href="./"><i class="fa fa-arrow-left"> </i>&nbsp; Tiếp tục mua sắm</a>      
                <a class="checkout-btn"  id="btnDatHang"><i class="fa fa-check"></i> Đặt hàng </a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-body">
                <p>Bạn Chưa Đăng Nhập</p>
                <p>Vui Lòng<a href="login.php" style="color:blue;"> Đăng Nhập </a></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
  </div>
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
          $('.promtPrice').html(res.promtPrice + ' $')          
          $('.totalPrice').html(res.totalPrice + ' $')
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
      var idSP = $(this).attr('id-sp')
       clearTimeout(timer);
      timer = window.setTimeout(function(){
        console.log(soluong)
        console.log( idSP)
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
            $('#discountPrice-'+idSP).html(res.discountPrice + ' $')
            $('.promtPrice').html(res.promtPrice + ' $')          
            $('.totalPrice').html(res.totalPrice + ' $')
            $( "#shoppingcart-inner" ).load(window.location.href + " #shoppingcart-inner" );
          }
        })
			 },500);
		})

    $('#btnDatHang').click(function(){
      <?php
            if(!isset($_SESSION['name'])){
      ?>
              $('#myModal1').modal('show');
      <?php }else{?>
        window.location.replace('checkout.php');
    <?php }?>
    })
  })

</script>