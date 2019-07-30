<?php
$products = $data['products'];
$count=count($products);
?>
<div class="main-container col2-left-layout">
      <div class="container">
        <div class="row">
          <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
            <div class="category-description std">
              <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                    <!-- Item -->
                    <div class="item">
                      <a href="#x">
                        <img alt="" src="public/source/images/cat-slider-img1.jpg">
                      </a>
                      <div class="inner-info">
                        <div class="cat-img-title">
                          <span>Our new range of</span>
                          <h2 class="cat-heading">
                            <strong>Smartphone</strong>
                          </h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                          <a class="info" href="#">Shop Now</a>
                        </div>
                      </div>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item">
                      <a href="#x">
                        <img alt="" src="public/source/images/cat-slider-img2.jpg">
                      </a>
                    </div>

                    <!-- End Item -->

                  </div>
                </div>
              </div>
            </div>
            <div class="shop-inner" style="height:560px;margin:0;">
            <div class="row">
                <h3>Tìm thấy <b id="count"><?=count($products)?></b> sản phẩm cho từ khóa <b><?=$_GET['keyword']?></b></h3>
            </div>

              <div class="product-grid-area">
                <ul class="products-grid">
                  <?php foreach($data['products'] as $p):?>
                  <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 rows" style="height:350px">
                    <div class="product-item">
                      <div class="item-inner">
                          <div class="product-thumbnail">
                            <?php if($p->percent_sale != null):?>
                            <div class="icon-sale-label sale-left">Sale</div>
                            <?php endif?>
                            <?php if($p->new == 1):?>
                            <div class="icon-new-label new-right">New</div>
                            <?php endif?>

                            <div class="pr-img-area">
                              <!-- detail.php?alias=iphone-x-64gb&id=2 -->
                              <a title="<?=$p->name?>" href="<?=$p->product_code?>">
                                <figure>
                                  <img class="first-img" src="public/source/images/products/<?=$p->image?>" alt="html template">
                                  <img class="hover-img" src="public/source/images/products/<?=$p->image?>" alt="html template">
                                </figure>
                              </a>
                              <button data-id="<?=$p->id?>" type="button" class="add-to-cart-mt">
                                <i class="fa fa-shopping-cart"></i>
                                <span> Add to Cart</span>
                              </button>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title">
                                <a title="<?=$p->name?>" href="<?=$p->product_code?>"><?=$p->name?></a>
                              </div>
                              <div class="item-content">
                              <div class="item-price">
                                <div class="price-box">
                                  <?php if($p->percent_sale != 0):?>
                                  <p class="special-price">
                                    <span class="price"> <?=number_format($p->value - ($p->percent_sale * $p->value))?> vnđ</span>
                                  </p>
                                  <p class="old-price">
                                    <span class="price"> <?=number_format($p->value) ?>vnđ</span>
                                  </p>
                                  <?php else :?>
                                  <p class="special-price">
                                    <span class="price"> <?=number_format($p->value)?> vnđ</span>
                                  </p>
                                  <?php endif ?>
                                </div>
                              </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </li>
                  <?php endforeach?>

                </ul>
              </div>
              
            </div>
            <div class="pagi" style="text-align: center;">
	              <ul id="pagination" class="justify-content-center"></ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Container End -->
  
<!-- jquery js -->

<script type="text/javascript" src="public/source/js/jquery.min.js"></script>
<script type="text/javascript">
            $(function () {
                var pageSize = 3; // Hiển thị 6 nội dung trên 1 trang
                showPage = function (page) {
                    $(".rows").hide();
                    $(".rows").each(function (n) {
                        if (n >= pageSize * (page - 1) && n < pageSize * page)
                            $(this).show();
                    });
                }
                showPage(1);
                ///** Cần truyền giá trị vào đây **///
                var totalRows =$('#count').text(); // Tổng số sản phẩm hiển thị
                // console.log(totalRows);
                var btnPage = 3; // Số nút bấm hiển thị di chuyển trang
                var iTotalPages = Math.ceil(totalRows / pageSize);
                // console.log(iTotalPages);
                 var obj = $('#pagination').twbsPagination({
                    totalPages: iTotalPages,	
                    visiblePages: btnPage,
                    onPageClick: function (event, page) {
                        console.info(page);
                        showPage(page);
                    }
                });
                console.info(obj.data());  
            });
</script>
<script>
    $(document).ready(function () {
      var oldContent = $('.products-grid').html()
      $(".input-type").click(function(){
        var check = $(this).prop("checked")
        var idType = $(this).attr('data-id')

        if(check){
          // console.log(idType)
          $.ajax({
            url: 'search.php',
            type: 'POST',
            data: {
              idType
            },
            success:function(res){
              // console.log(res)

              $('.shop-inner').removeClass('shop-inner')
              $('.page-title').hide()
              // $('.pagination-area').hide()

              if($('.products-grid').hasClass('append')){
                $('.products-grid').append(res)

              }
              else{
                $('.products-grid').html(res)
                $('.products-grid').addClass('append')
              }
             
            },
            error:function(error){
              console.log(error)
            }
          })
        }
        else{
          // console.log(idType)
          $('.type-product-'+idType).remove()
          if($('.append').find('li.item').length==0){
            $('.page-title').show()
            $('.pagination-area').show()
            $('.products-grid').html(oldContent)
            $('.shop-inner').addClass('shop-inner')
            $('.append').removeClass('append')
          }
        }
      })
    })

    </script>
