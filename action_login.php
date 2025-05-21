<?php
include("includes/header.php");
session_start();

if (isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['password']) && !empty($_POST['password'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

} else {
    exit("برخی از فیلدها مقداردهی نشده‌اند.");
}

$link = mysqli_connect("localhost", "root", "", "narinShop");
if (mysqli_connect_errno()) {
    exit(mysqli_connect_error());
}

$query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);

if ($row) {
    $_SESSION["state_login"] = true;
    $_SESSION["FLname"] = $row['firstname'] . ' ' . $row['lastname'];

    if ($row['type'] == 1) {
        $_SESSION["user_type"] = "admin";
        ?>
        <script type="text/javascript">
            location.replace("admin_products.php");
        </script>
        <?php
    } else {
        $_SESSION["user_type"] = "public";
        ?>
        <script type="text/javascript">
            location.replace("index.php");
        </script>
        <?php
    }

} else {
    echo "اطلاعات به درستی وارد نشده است.";
}

mysqli_close($link);
?>
