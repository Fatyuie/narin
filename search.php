<?php
include("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "narinShop");
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

$searchTerm = '';
if (isset($_GET['q'])) {
    $searchTerm = mysqli_real_escape_string($link, trim($_GET['q']));
}

if ($searchTerm != '') {
    $query = "SELECT * FROM products WHERE 
              pro_name LIKE '%$searchTerm%' OR 
              pro_detail LIKE '%$searchTerm%' OR 
              category LIKE '%$searchTerm%'";
} else {
    // اگر هیچ چیزی جستجو نشده باشه، همه محصولات رو نمایش میده (یا میتونی خالی نشون بده)
    $query = "SELECT * FROM products LIMIT 0"; // یعنی هیچ محصولی
}

$result = mysqli_query($link, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($link));
}
?>

<div class="search-results">
    <h2>نتایج جستجو برای «<?php echo htmlspecialchars($searchTerm); ?>»</h2>
</div>

<table class="formproducts" style="width: 100%; border-collapse: collapse;">
    <?php
    $counter = 0;
    while ($row = mysqli_fetch_array($result)) {
        if ($counter % 3 == 0) echo "<tr>";
    ?>
        <td style="width: 33%; padding: 10px; vertical-align: top; text-align: center; border: 1px solid #ccc;">
            <a href="product_detail.php?id=<?php echo $row['pro_code']; ?>">
                <img src="img/products/<?php echo rawurlencode($row['pro_image']); ?>" width="250px" height="150px" alt="<?php echo htmlspecialchars($row['pro_name']); ?>" />
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
