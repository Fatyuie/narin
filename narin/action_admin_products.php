 
<?php
include("includes/header.php");

if (!isset($_SESSION["state_login"]) || $_SESSION["state_login"] !== true || $_SESSION["user_type"] != "admin") {
    echo "<script>location.replace('index.php');</script>";
    exit();
}

$link = mysqli_connect("localhost", "root", "", "narinshop");
mysqli_set_charset($link, "utf8mb4");
if (mysqli_connect_errno()) exit(mysqli_connect_error());

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? mysqli_real_escape_string($link, $_GET['id']) : '';

if ($action == 'DELETE') {
    if (empty($id)) exit("شناسه محصول برای حذف تعیین نشده است");
    $query = "DELETE FROM products WHERE pro_code='$id'";
    if (mysqli_query($link, $query)) {
        echo "<script>alert('محصول حذف شد'); location.href='admin_products.php';</script>";
    } else {
        echo "<script>alert('خطا در حذف محصول'); location.href='admin_products.php';</script>";
    }
    mysqli_close($link);
    include("includes/footer.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     
    $pro_code = isset($_POST['pro_code']) ? mysqli_real_escape_string($link, trim($_POST['pro_code'])) : '';
    $pro_name = isset($_POST['pro_name']) ? mysqli_real_escape_string($link, trim($_POST['pro_name'])) : '';
    $pro_qty = isset($_POST['pro_qty']) ? (int)$_POST['pro_qty'] : 0;
    $pro_price = isset($_POST['pro_price']) ? (int)$_POST['pro_price'] : 0;
    $category = isset($_POST['category']) ? mysqli_real_escape_string($link, trim($_POST['category'])) : '';
    $pro_detail = isset($_POST['pro_detail']) ? mysqli_real_escape_string($link, trim($_POST['pro_detail'])) : '';

    if (empty($pro_code) || empty($pro_name) || $pro_qty < 0 || $pro_price <= 0 || empty($category) || empty($pro_detail)) {
        exit("برخی از فیلدها مقداردهی نشده‌اند یا نامعتبر هستند");
    }

    $imageUploaded = false;
    $pro_image = '';

    if (isset($_FILES['pro_image']) && $_FILES['pro_image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "img/products/";
        $imageFileType = strtolower(pathinfo($_FILES['pro_image']['name'], PATHINFO_EXTENSION));
        $target_file = $target_dir . basename($_FILES['pro_image']['name']);

        $check = getimagesize($_FILES['pro_image']['tmp_name']);
        if ($check === false) exit("پرونده انتخاب شده یک تصویر نیست");
        if (file_exists($target_file)) exit("پرونده‌ای با همین نام در سرویس‌دهنده میزبان وجود دارد");
        if ($_FILES['pro_image']['size'] > 500 * 1024) exit("حجم تصویر نباید بیشتر از 500KB باشد");
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) exit("فقط پسوندهای JPG, JPEG, PNG, GIF برای پرونده مجاز هستند");

        if (!move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_file)) exit("پرونده انتخاب شده به سرویس‌دهنده میزبان ارسال نشد");

        $pro_image = basename($_FILES['pro_image']['name']);
        $imageUploaded = true;
    }

     
    } else {
        if (!$imageUploaded) exit("لطفاً تصویر محصول را انتخاب کنید");

        $checkQuery = "SELECT pro_code FROM products WHERE pro_code='$pro_code'";
        $checkRes = mysqli_query($link, $checkQuery);
        if (mysqli_num_rows($checkRes) > 0) exit("کد کالا تکراری است");

        $query = "INSERT INTO products (pro_code, pro_name, pro_qty, pro_price, category, pro_detail, pro_image)
                  VALUES ('$pro_code', '$pro_name', $pro_qty, $pro_price, '$category', '$pro_detail', '$pro_image')";

        if (mysqli_query($link, $query)) {
            echo "<script>alert('افزودن انجام شد'); location.href='admin_products.php';</script>";
        } else {
            exit("خطا در افزودن کالا: " . mysqli_error($link));
        }
    }


mysqli_close($link);
include("includes/footer.php");
?>
