<?php
 include('includes/header.php');
 
if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true)
{
?>	
<script type="text/javascript">
location.replace("index.php");
</script>
<?php
	}	
?>
	 
 

<div class="signup-container">
  <h2>ورود حساب کاربری</h2>
  <form name="login" action="action_login.php" method="Post">
 
 
    <div class="form-group">
      <label>  ایمیل:</label>
      <input type="text" id="email" name="email" />
    </div>
    <div class="form-group">
      <label for="password">رمز عبور:</label>
      <input type="password" id="password" name="password" />
    </div>

    <button type="submit" class="buttonsubmit">ورود</button>
  </form>
  <div class="register-link"> قبلا وارد نشده اید؟<a href="register.php">ثبت نام</a></div>
</div>
