
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
                <input id="emmail_login" type="email" class="form-control" name="email" minlength="5" maxlength="50">
                <label for="password_login">Password<span class="required">*</span></label>
                <input id="password_login" type="password" class="form-control" name="pass" minlength="6" maxlength="10">
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
                <input id="fullname_register" type="text" class="form-control" name="fullname_regis" minlength="5" maxlength="20">
                <label for="gender_register">Gender<span class="required">*</span></label><br>
                <input type="radio" name="gender" value="nam" checked style="width:20px;">nam
                <input type="radio" name="gender" value="nữ" style="width:20px;margin-left:30px;">nữ	<br>										
                <label for="address_register">Address<span class="required">*</span></label>
                <input id="address_register" type="text" class="form-control" name="address_regis" minlength="5" maxlength="50">
                <label for="phone_register">Phone<span class="required">*</span></label>
                <input id="phone_register" type="text" class="form-control" name="phone_regis" minlength="10" maxlength="10">
                <label for="pass_register">Password<span class="required">*</span></label>
                <input id="pass_register" type="password" class="form-control" name="pass_regis" minlength="6" maxlength="10">
                <label for="email_register">Email address<span class="required">*</span></label>
                <input id="email_register" type="email" class="form-control" name="email_regis" minlength="10" maxlength="50">
                <?php if(isset($_SESSION['regiserror'])){
		                echo "<div style='color:red;' class='input-tb'>".$_SESSION['regiserror']."</div>";
	              }else if(isset($_SESSION['success_regis'])){
                  echo "<div style='color: green;background: #fed700;margin-top: 10px;width: 262px;height: 35px;text-align: center;padding-top: 7px;font-size: 16px;' class='input-tb'>".$_SESSION['success_regis']."</div>";
                }
                ?>	
                <button class="button"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button>
                </form>          
                <div class="register-benefits">
												
              </div>
   
    
        </div>
      </div>

    </div>
  </section>
  <?php
   if(!isset($_SESSION)) session_start();
  if(isset($_SESSION['error'])){
    unset($_SESSION['error']);
  }else if(isset($_SESSION['regiserror'])){
    unset($_SESSION['regiserror']);
  }else if(isset($_SESSION['success_regis'])){
    unset($_SESSION['success_regis']);
  }
  ?>