<?php
 include("includes/header.php");
 
 $link = mysqli_connect("localhost", "root", "", "narinShop");

 if (mysqli_connect_errno()) {
     exit("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
 }
 $pro_code=0;
 if(isset($_GET['id']))
 $pro_code=$_GET['id'];

 if(!(isset($_SESSION["state_login"]) && $_SESSION["state_login"]=== true)){
    ?>
 <p> برای خرید از فروشگاه ابتدا باید وارد سایت شوید</p>
 </br></br>
 <p>در صورتی که ثبت نام نکرده اید روی <a href="register.php">ثبت نام </a> کلیک کنید. در غیرغیر این صورت روی <a href="login.php">ورود</a> کلیک کنید.</p>
 </br></br>
 <?php

 exit(); }

 $query="SELECT * FROM products WHERE pro_code='$pro_code'";
 $result=mysqli_query($link,$query);
  ?>
  <form name="order" action="action_order.php" method="post">  
  <?php
  if($row=mysqli_fetch_array($result))
  {
  ?>

 


   

    کد کالا:
     <input type="text" id="pro_code" name="pro_code" value="<?php echo($pro_code); ?>">
    
     نام کالا:
     <input type="text" id="pro_name" name="pro_name" value="<?php echo($pro_name); ?>">
    
     قیمت:
     <input type="text" id="pro_price" name="pro_price" value="<?php echo($pro_price); ?>">
     
     تعداد درخواستی:
     <input type="text" id="pro_qty" name="pro_qty" value="<?php echo($pro_qty); ?>">

     قیمت کل:
     <input type="text" id="total_price" name="total_price" value="<?php echo($total_price); ?>">



     <script type="text/javascript">
        function cale_price()
        {
            var pro_qty=<?php echo($row['pro_qty']);?>;
            var price=document.getElementById('pro_price').value;
            var count=document.getElementById('pro_qty').value;
            var total_price;
            if(count>pro_qty){
                alert('تعدادی موجودی انبار کمتر از درخواست شما است');
                document.getElementById('pro_qty').value=0;
                count=0;
            }
            if(count==0  || count=='')
            total_price=0;
        else
        total_price=count*price;
        document.getElementById('total_price').value=total_price;
        }
     </script>
   <?php
   $query="SELECT * FROM user WHERE username='{$_SESSION['username']}'";
   $result=mysqli_query($link,$query);
   $user_row=mysqli_fetch_array($result);
   ?>

   نام خریدار:
   <input type="text" id="realname" name="realname" value="<?php echo($user_row['realname']); ?>">

   شماره تلفن همراه:
   <input type="text" id="mobile" name="mobile" value="09">

   ادرس:
   <textarea id="address" name="address"  cols="30" rows="3" wrap="virtual"></textarea>
   


   <button onclick="check_input();">ارسال محصول به سبد خرید</button>
   
   <script type="text/javascript">
   function check_input()
   {
    var r=confirm=true;
    if(r==true){
        var validation=true;
        var count=document.getElementById('pro_qty').value;
        var mobile=document.getElementById('mobile').value;
        var address=document.getElementById('address').value;
        

        if(count==0 || count=='')
        validation=false;
        
        if(mobile.length<11)
        validation=false;
        
        if(address.length<15)
        validation=false;
    
        if(validation)
        document.order.submit();
        else
        alert('برخی از فیلد ها به درستی پر نشده اند')
    
    }
   } 
    </script>

    <img src="img/products/" <?php echo($row['pro_image']) ?>>
  </form>
  <?php
  } 
  include("includes/footer.php");
  