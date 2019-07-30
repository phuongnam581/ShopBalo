<?php
$featuredProduct = $data['featuredProduct'];
$bestSellers = $data['bestSellers'];
$newProducts = $data['newProducts'];
  // print_r($newProducts);
  // die;
?>
    <!-- Home Slider Start -->
    <div class="slider" style="margin-top:1px;">
      <div class="tp-banner-container clearfix">
        <div class="tp-banner">
         
          <ul>
            <!-- SLIDE 1 -->
         
            <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
              <!-- MAIN IMAGE -->
              <img src="public/source/images/slider/slide1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <!-- LAYERS -->
              <!-- LAYER NR. 1 -->
            </li>
            <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
              <!-- MAIN IMAGE -->
              <img src="public/source/images/slider/slide2.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <!-- LAYERS -->
              <!-- LAYER NR. 1 -->
            </li>
            <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700">
              <!-- MAIN IMAGE -->
              <img src="public/source/images/slider/slide3.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
              <!-- LAYERS -->
              <!-- LAYER NR. 1 -->
            </li>
            
          </ul>
        </div>
      </div>
    </div>

    <!-- main container -->
    <div class="main-container col1-layout">
      <div class="container">
        <div class="row">

          <!-- Home Tabs  -->
          <div class="col-sm-12 col-md-12 col-xs-12">
            <div class="home-tab">
              <ul class="nav home-nav-tabs home-product-tabs">
                <li class="active">
                  <a href="#featured" data-toggle="tab" aria-expanded="false">Sản phẩm nổi bật</a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="#top-sellers" data-toggle="tab" aria-expanded="false">Sản phẩm khuyến mãi</a>
                </li>
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane active in" id="featured">
                  <div class="featured-pro">
                    <div class="slider-items-products">
                      <div id="featured-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4">
                          <?php foreach($featuredProduct as $p):?>
                          <div class="product-item">
                            <div class="item-inner">
                              <div class="product-thumbnail">
                                <?php if($p->percent_sale != 'null'):?>
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
                                  <button id-sp="<?=$p->id?>" type="button" class="add-to-cart-mt">
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
                                      <?php if($p->percent_sale != 'null'):?>
                                      <p class="special-price">
                                        <span class="price"> <?=number_format($p->value - ($p->percent_sale * $p->value))?> vnđ</span>
                                      </p>
                                      <p class="old-price">
                                        <span class="price"> <?=number_format($p->value) ?> vnđ</span>
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
                          <?php endforeach?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="top-sellers">
                  <div class="top-sellers-pro">
                    <div class="slider-items-products">
                      <div id="top-sellers-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 ">
                          <?php foreach($bestSellers as $p):?>
                          <div class="product-item">
                            <div class="item-inner">
                              <div class="product-thumbnail">
                                <?php if($p->percent_sale != 'null'):?>
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
                                  <button id-sp="<?=$p->id?>" type="button" class="add-to-cart-mt">
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
                                      <?php if($p->percent_sale != 'null'):?>
                                      <p class="special-price">
                                        <span class="price"> <?=number_format($p->value - ($p->percent_sale * $p->value))?>  vnđ</span>
                                      </p>
                                      <p class="old-price">
                                        <span class="price"> <?=number_format($p->value) ?> vnđ</span>
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
                          <?php endforeach?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- end main container -->

    <!--special-products-->

    <div class="container">
      <div class="special-products">
        <div class="page-header">
          <h2>Sản phẩm mới</h2>
        </div>
        <div class="special-products-pro">
          <div class="slider-items-products">
            <div id="special-products-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4">

               <?php foreach($newProducts as $p):?>
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail">
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
                          <button  id-sp="<?=$p->id?>" type="button" class="add-to-cart-mt">
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
                              <p class="special-price">
                                <span class="price"> <?=number_format($p->value)?> vnđ</span>
                              </p>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- category area start -->
    <div class="jtv-category-area">
     
          <img src="public/source/images/slider/slideshow.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
     
    </div>
    <!-- category-area end -->

  
