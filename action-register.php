<?php
 

include("includes/header.php");

if (
    isset($_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['tel'], $_POST['password']) &&
    !empty($_POST['name']) &&
    !empty($_POST['lastname']) &&
    !empty($_POST['email']) &&
    !empty($_POST['tel']) &&
    !empty($_POST['password'])
) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = $_POST['password'];
} else {
    exit('برخی از فیلد ها مقداردهی نشده است.');
}

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    exit('ایمیل واردشده صحیح نمی باشد.');
}

$link = mysqli_connect("localhost", "root", "", "narinShop");

if (mysqli_connect_errno()) {
    exit("خطا در اتصال به دیتابیس: " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8mb4");

$query = "INSERT INTO users(`firstname`, `lastname`, `email`, `tel`, `password`, `type`) 
          VALUES ('$name', '$lastname', '$email', '$tel', '$password', '0')";

if (mysqli_query($link, $query)) {
    // ست کردن سشن قبل از ارسال هر خروجی
    $_SESSION['state_login'] = true;
    $_SESSION['user_type'] = 0; // کاربر عادی
    $_SESSION['user_name'] = $name;

    ?>
    <script>
        alert("<?php echo addslashes("$name $lastname عضویت شما در فروشگاه نارین با موفقیت انجام شد."); ?>");
        window.location.href = "index.php";
    </script>
    <?php
} else {
    echo("عضویت شما در فروشگاه نارین انجام نشد. خطا: " . mysqli_error($link));
}

mysqli_close($link);
include("includes/footer.php");
?>
