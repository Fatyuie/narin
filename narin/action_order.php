<?php
 include('includes/header.php');
 if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true){
?>
	
<script type="text/javascript">
location.replace("index.php");
</script>
<?php
	}	

$pro_code=$_POST['pro_code'];
$pro_name=$_POST['pro_name'];
$pro_qty=$_POST['pro_qty'];
$pro_price=$_POST['pro_price'];
$total_price=$_POST['total_price'];
$realname=$_POST['realname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];


$username=$_SESSION['username'];

$link=mysqli_connect("localhost","root","","narinShop");
//   if(mysqli_connect_errno());
//  exit("error: ".mysqli_connect_error());

$query="INSERT INTO `orders`(
`id`
, `username`
, `orderdate`
, `pro_code`
, `pro_qty`
, `pro_price`
, `mobile`
, `address`
, `trackcode`
, `state`) 
VALUES (
0,
'$username',
'" . date('Y-m-d') . "',
'$pro_code',
'$pro_qty',
'$pro_price',
'$mobile',
'$address',
'000000000000000000000000',
'0')";

//  0 تحت بررسی
//  1آماده برای ارسال
//  2ارسال شده
//  3سفارش لغو شده است

if(mysqli_query($link,$query)===true){
    ?>
    <script>
        window.alert("کاربر گرامی  سفارش شما با موفقیت در سامانه ثبت شد");
    </script>
 <?php

$query = "UPDATE products SET pro_qty = pro_qty - $pro_qty WHERE pro_code = '$pro_code'";
mysqli_query($link, $query);


}
else
?>
<script>
window.alert("خطا در ثبت سفارش");
</script>
<?php
mysqli_close($link);
include('includes/footer.php');
?> 


