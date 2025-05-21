<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
 
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ACCESSORY NARIN</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" href="img/ico.jpg" />
    <style>
        body {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 97vh;
        }
    </style>
    

</head>
<body>
     
<div class="divheader">
    <div class="nameshop">
        <h2 style="text-align: right;">ACCESSORY NARIN</h2>
    </div>

    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>

    <nav dir="ltr">
        <!-- لینک درباره ما -->
        <?php if ($currentPage != "darbarema.php"): ?>
            <a href="darbarema.php">درباره ما</a>
        <?php else: ?>
            <a href="index.php" class="active-link">خانه</a>
        <?php endif; ?>

        <!-- لینک راهنما -->
        <?php if ($currentPage != "rahnama.php"): ?>
            <a href="rahnama.php">راهنما</a>
        <?php else: ?>
            <a href="index.php" class="active-link">خانه</a>
        <?php endif; ?>

        <!-- لینک ورود / ثبت‌نام / خروج -->
        <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true): ?>
            <a href="logout.php" class="display-link">خروج</a>

            <?php if ($_SESSION["user_type"] == "admin"): ?>
                <?php if ($currentPage == "admin_products.php"): ?>
                    <a href="index.php" class="display-link">خانه</a>
                <?php else: ?>
                    <a href="admin_products.php" class="display-link">مدیریت محصولات</a>
                <?php endif; ?>
            <?php endif; ?>

        <?php else: ?>
            <?php if ($currentPage == "register.php" || $currentPage == "login.php"): ?>
                <a href="index.php" class="active-link">خانه</a>
            <?php else: ?>
                <a href="register.php" class="display-link">ثبت نام</a>
                <a href="login.php" class="display-link">ورود</a>
            <?php endif; ?>
        <?php endif; ?>

        <div class="animation"></div>
    </nav>
 
   <div class="search">
    <form method="GET" action="search.php">
        <input
            style="border-radius: 32px; width:65%; text-align: right"
            type="search"
            name="q"
           placeholder="  اکسسوری مورد علاقت را پیدا کن  "
        />
        <button class="buttonsearch" type="submit">جستجو</button>
    </form>
   </div>


</div>
