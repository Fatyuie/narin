<?php
include("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "narinShop");
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$category = '';
if (isset($_GET['category'])) {
    $category = mysqli_real_escape_string($link, $_GET['category']);
}

if ($category != '') {
    $query = "SELECT * FROM products WHERE category = '$category'";
} else {
    $query = "SELECT * FROM products";
}

$result = mysqli_query($link, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($link));
}
?>

<table class="formproducts" style="width: 100%; border-collapse: collapse;">
    <?php
    $counter = 0;
    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 3 == 0) echo "<tr>";
    ?>
        <td style="width: 33%; padding: 10px; vertical-align: top; text-align: center; border: 1px solid #ccc;">
            <a href="product_detail.php?id=<?php echo $row['pro_code']; ?>">
                <img src="/narin/narin/img/products/<?php echo rawurlencode($row['pro_image']); ?>" width="250px" height="150px" alt="<?php echo htmlspecialchars($row['pro_name']); ?>" />
            </a>
            <br/>
            <h4><?php echo htmlspecialchars($row['pro_name']); ?></h4>
            <br/>
            قیمت: <?php echo number_format($row['pro_price']); ?> تومان
            <br/>
            تعداد موجودی: <?php echo (int)$row['pro_qty']; ?>
            <br/>
            توضیحات: <?php echo htmlspecialchars(substr($row['pro_detail'], 0, 120)); ?>
            <br/><br/>
            <a href="product_detail.php?id=<?php echo $row['pro_code']; ?>" class="probutton">مشاهده محصول</a>
        </td>
    <?php
        $counter++;
        if ($counter % 3 == 0) echo "</tr>";
    }
    if ($counter % 3 != 0) echo "</tr>";
    ?>
</table>

<?php include("includes/footer.php"); ?>
