
<section class="main-container col1-layout">
    <div class="main container">
      
        
        <div class="page-content">
          
            <div class="account-login">
              <div class="box-authentication">
                <form action="login.php" method="post">
                    <div class="container-fluid">
                    <h4>Login</h4>
               <p class="before-login-text">Welcome back! Sign in to your account</p>
                <label for="emmail_login">Email address<span class="required">*</span></label>
                <input id="emmail_login" type="text" class="form-control" name="email">
                <label for="password_login">Password<span class="required">*</span></label>
                <input id="password_login" type="password" class="form-control" name="pass">
                <div class="input-tb" style="color:red"></div>
                <?php if(isset($_SESSION['error'])):
		                echo "<div style='color:red;' class='input-tb'>".$_SESSION['error']."</div>";
	              ?>	
	              <?php endif?>
                <button class="button"  value="login" name="login"><i class="fa fa-lock"></i>&nbsp; <span>Login</span></button>
                    </div>
                </form>    
              </div>
              <div class="box-authentication">
                <form action="login.php" method="post">
                <h4>Register</h4><p>Create your very own account</p>
                <label for="fullname_register">Fullname<span class="required">*</span></label>
                <input id="fullname_register" type="text" class="form-control" name="fullname_regis">
                <label for="gender_register">Gender<span class="required">*</span></label><br>
                <input type="radio" name="gender" value="nam" checked style="width:20px;">nam
                <input type="radio" name="gender" value="nữ" style="width:20px;margin-left:30px;">nữ	<br>										
                <label for="email_register">Email address<span class="required">*</span></label>
                <input id="email_register" type="text" class="form-control" name="email_regis">
                <label for="address_register">Address<span class="required">*</span></label>
                <input id="address_register" type="text" class="form-control" name="address_regis">
                <label for="phone_register">Phone<span class="required">*</span></label>
                <input id="phone_register" type="text" class="form-control" name="phone_regis">
                <label for="pass_register">Password<span class="required">*</span></label>
                <input id="pass_register" type="password" class="form-control" name="pass_regis">
                <?php if(isset($_SESSION['error_regis'])){
		                echo "<div style='color:red;' class='input-tb'>".$_SESSION['error_regis']."</div>";
	              }else if(isset($_SESSION['success_regis'])){
                  echo "<div style='color: green;background: #fed700;margin-top: 10px;width: 262px;height: 35px;text-align: center;padding-top: 7px;font-size: 16px;' class='input-tb'>".$_SESSION['success_regis']."</div>";
                }
                ?>	
                <button class="button"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>
                </form>          
                <div class="register-benefits">
												<h5>Sign up today and you will be able to :</h5>
												<ul>
													<li>Speed your way through checkout</li>
													<li>Track your orders easily</li>
													<li>Keep a record of all your purchases</li>
												</ul>
											</div>
              </div>
   
    
        </div>
      </div>

    </div>
  </section>
  <?php
   if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
  }else if(isset($_SESSION['error_regis'])){
    unset($_SESSION['error_regis']);
  }else if(isset($_SESSION['success_regis'])){
    unset($_SESSION['success_regis']);
  }
  ?>