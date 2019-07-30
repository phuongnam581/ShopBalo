<!-- Main Container -->
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page"><div class="page-title">
          <h2>Đặt hàng</h2>
          <?php if(isset($_SESSION['success'])):?>
            <div class="alert alert-success">
                <?=$_SESSION['success']; unset($_SESSION['success'])?>
            </div>
          <?php endif?>
          <?php if(isset($_SESSION['error'])):?>
            <div class="alert alert-danger">
                <?=$_SESSION['error']; unset($_SESSION['error'])?>
            </div>
          <?php endif?>
        </div>
            <form method="POST" >
                <div class="box-border">
                    <ul>
                        <li class="row"> 
                            <div class="col-xs-6">
                                <label for="address" class="required">Address</label>
                                <input type="text" class="input form-control" name="address" id="address" value="<?=$_SESSION['customer']->address?>"required>
                            </div><!--/ [col] -->
                        </li><!-- / .row -->
                        <li>
                            <button type="submit" name="btnCheckout" class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Đặt hàng</span></button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
      </div>
      
    </div>
  </div>
  </section>
  <!-- Main Container End -->