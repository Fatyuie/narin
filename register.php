<?php
 include('includes/header.php');
 if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
?>
	
<script type="text/javascript">
location.replace("index.php");
</script>
<?php
	}	
?>
<div class="signup-container">
  <h2>ایجاد حساب کاربری</h2>
  <form name="register" action="action-register.php" method="Post">
    <div class="form-group">
      <label for="name">نام:</label>
      <input type="text" id="name" name="name" />
    </div>
    <div class="form-group">
      <label for="name">نام خانوادگی:</label>
      <input type="text" id="lastname" name="lastname" />
    </div>
    <div class="form-group">
      <label for="email">ایمیل:</label>
      <input type="email" id="email" name="email" />
    </div>
    <div class="form-group">
      <label for="tel">شماره تماس:</label>
      <input type="tel" id="tel" name="tel" />
    </div>

    <div class="form-group">
      <label for="password">رمز عبور:</label>
      <input type="password" id="password" name="password" />
    </div>

    <button type="submit" class="buttonsubmit">ثبت نام</button>
  </form>
  <div class="login-link">قبلاً ثبت نام کرده‌اید؟ <a href="login.php">ورود</a></div>
</div>
