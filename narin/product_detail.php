<?php
include("includes/header.php");
 

$link = mysqli_connect("localhost", "root", "", "narinShop");
if (!$link) {
    exit("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}

$pro_code = 0;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // اگه pro_code متنیه مثل "NR2" باید اینطور باشه:
    $pro_code = mysqli_real_escape_string($link, $_GET['id']);
} else {
    echo "محصولی انتخاب نشده یا شناسه نامعتبر است.";
    include("includes/footer.php");
    exit;
}

$query = "SELECT * FROM products WHERE pro_code = '$pro_code'";
$result = mysqli_query($link, $query);

if (!$result) {
    echo "خطا در کوئری: " . mysqli_error($link);
    include("includes/footer.php");
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "محصول مورد نظر یافت نشد.";
    include("includes/footer.php");
    exit;
}

$row = mysqli_fetch_assoc($result);

// داده‌های فرم سفارش
$pro_name = $row['pro_name'];
$pro_price = $row['pro_price'];
$pro_qty = 1;  // پیشفرض تعداد

// اگر کاربر وارد نشده
if (!isset($_SESSION['username'])) {
    echo "<p>برای خرید ابتدا باید وارد سایت شوید.</p>";
    echo '<p><a href="login.php">ورود</a> | <a href="register.php">ثبت نام</a></p>';
    include("includes/footer.php");
    exit;
}

// گرفتن اطلاعات کاربر
$user_query = "SELECT * FROM user WHERE username = '" . mysqli_real_escape_string($link, $_SESSION['username']) . "'";
$user_result = mysqli_query($link, $user_query);
if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
} else {
    $user_row = ['realname' => '', 'mobile' => '09'];
}
?>

<form name="order" action="action_order.php" method="post">
    کد کالا:
    <input type="text" id="pro_code" name="pro_code" value="<?php echo htmlspecialchars($pro_code); ?>" readonly>

    نام کالا:
    <input type="text" id="pro_name" name="pro_name" value="<?php echo htmlspecialchars($pro_name); ?>" readonly>

    قیمت:
    <input type="text" id="pro_price" name="pro_price" value="<?php echo htmlspecialchars($pro_price); ?>" readonly>

    تعداد درخواستی:
    <input type="number" id="pro_qty" name="pro_qty" value="<?php echo $pro_qty; ?>" min="1" max="<?php echo $row['pro_qty']; ?>" oninput="calculatePrice()">

    قیمت کل:
    <input type="text" id="total_price" name="total_price" value="<?php echo htmlspecialchars($pro_price * $pro_qty); ?>" readonly>

    نام خریدار:
    <input type="text" id="realname" name="realname" value="<?php echo htmlspecialchars($user_row['realname']); ?>">

    شماره تلفن همراه:
    <input type="text" id="mobile" name="mobile" value="<?php echo htmlspecialchars($user_row['mobile']); ?>">

    آدرس:
    <textarea id="address" name="address" cols="30" rows="3"></textarea>

    <button type="submit">ارسال محصول به سبد خرید</button>
</form>

<script>
function calculatePrice() {
    var qty = parseInt(document.getElementById('pro_qty').value);
    var price = parseInt(document.getElementById('pro_price').value);
    var maxQty = parseInt(document.getElementById('pro_qty').max);

    if (qty > maxQty) {
        alert('تعداد درخواستی بیشتر از موجودی انبار است');
        document.getElementById('pro_qty').value = maxQty;
        qty = maxQty;
    }
    if (qty < 1 || isNaN(qty)) {
        qty = 1;
        document.getElementById('pro_qty').value = 1;
    }
    document.getElementById('total_price').value = qty * price;
}
</script>

<?php
include("includes/footer.php");
?>
