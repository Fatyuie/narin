<?php
include("includes/header.php");

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
    ?>
    <script type="text/javascript">
        location.replace("index.php");
    </script>
    <?php
    exit();
}

$link = mysqli_connect("localhost", "root", "", "narinshop");
if (mysqli_connect_errno()) exit(mysqli_connect_error());
mysqli_set_charset($link, "utf8mb4"); // مهم برای فارسی

$url = $pro_code = $pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail = $category = "";
$btn_caption = "افزودن کالا";

if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    $query = "SELECT * FROM products WHERE pro_code='$id'";
    $result = mysqli_query($link, $query);
    if ($row = mysqli_fetch_array($result)) {
        $pro_code = $row['pro_code'];
        $pro_name = $row['pro_name'];
        $pro_qty = $row['pro_qty'];
        $pro_price = $row['pro_price'];
        $pro_image = $row['pro_image'];
        $pro_detail = $row['pro_detail'];
        $category = $row['category'];
        $url = "?id=" . urlencode($pro_code) . "&action=EDIT";
        $btn_caption = "ویرایش کالا";
    }
}
?>

<form name="add_product" action="action_admin_products.php<?php if (!empty($url)) echo $url; ?>" method="POST" enctype="multipart/form-data">
    <table style="width:50%; margin: auto;" border="0">
        <tr>
            <td style="width: 22%;">کد کالا <span style="color: red;">*</span></td>
            <td style="width: 78%;">
                <input type="text" id="pro_code" name="pro_code" value="<?php echo htmlspecialchars($pro_code); ?>" />
            </td>
        </tr>

        <tr>
            <td>نام کالا <span style="color: red;">*</span></td>
            <td><input type="text" style="text-align: right;" id="pro_name" name="pro_name" value="<?php echo htmlspecialchars($pro_name); ?>" required /></td>
        </tr>

        <tr>
            <td>موجودی کالا <span style="color: red;">*</span></td>
            <td><input type="text" style="text-align: left;" id="pro_qty" name="pro_qty" value="<?php echo (int)$pro_qty; ?>" required /></td>
        </tr>

        <tr>
            <td>قیمت کالا <span style="color: red;">*</span></td>
            <td><input type="text" style="text-align: left;" id="pro_price" name="pro_price" value="<?php echo (int)$pro_price; ?>" required /> تومان </td>
        </tr>

        <tr>
            <td>آپلود تصویر کالا <span style="color: red;"><?php echo (empty($url) ? "*" : ""); ?></span></td>
            <td>
                <input type="file" style="text-align: left;" id="pro_image" name="pro_image" size="30" <?php echo (empty($url) ? "required" : ""); ?> />
                <?php 
                if (!empty($pro_image)) {
                    $imgPath = "/narin/narin/img/products/" . rawurlencode($pro_image);
                    echo "<br/><img src='$imgPath' width='80' height='40' alt='تصویر کالا' />";
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>دسته‌بندی <span style="color: red;">*</span></td>
            <td><input type="text" style="text-align: left;" id="category" name="category" value="<?php echo htmlspecialchars($category); ?>" required /></td>
        </tr>

        <tr>
            <td>توضیحات تکمیلی کالا <span style="color: red;">*</span></td>
            <td>
                <textarea id="pro_detail" name="pro_detail" cols="45" rows="10" wrap="virtual" required><?php echo htmlspecialchars(trim($pro_detail)); ?></textarea>
            </td>
        </tr>

        <tr>
            <td><br /><br /></td>
            <td>
                <input type="submit" value="<?php echo $btn_caption; ?>" />
                &nbsp;&nbsp;&nbsp;
                <input type="reset" value="جدید" />
            </td>
        </tr>
    </table>
</form>

<?php
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);
?>

<table border="1" style="width: 100%; margin-top: 40px;">
    <tr>
        <th>کد کالا</th>
        <th>نام کالا</th>
        <th>موجودی</th>
        <th>قیمت</th>
        <th>دسته بندی</th>
        <th>تصویر</th>
        <th>مدیریت</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($result)) { 
        $imagePath = "/narin/narin/img/products/" . rawurlencode($row['pro_image']);
    ?>
        <tr>
            <td><?php echo htmlspecialchars($row['pro_code']); ?></td>
            <td><?php echo htmlspecialchars($row['pro_name']); ?></td>
            <td><?php echo (int)$row['pro_qty']; ?></td>
            <td><?php echo (int)$row['pro_price']; ?> تومان</td>
            <td><?php echo htmlspecialchars($row['category']); ?></td>
            <td>
                <?php if (!empty($row['pro_image'])): ?>
                    <img src="<?php echo $imagePath; ?>" width="150" height="50" alt="تصویر کالا" />
                <?php else: ?>
                    تصویر ندارد
                <?php endif; ?>
            </td>
            <td>
                <a href="action_admin_products.php?id=<?php echo urlencode($row['pro_code']); ?>&action=DELETE" onclick="return confirm('آیا مطمئنید؟')" style="text-decoration:none; color:red;">حذف</a>
                |
                <a href="admin_products.php?id=<?php echo urlencode($row['pro_code']); ?>&action=EDIT" style="text-decoration:none;">ویرایش</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php
mysqli_close($link);
include("includes/footer.php");
?>
