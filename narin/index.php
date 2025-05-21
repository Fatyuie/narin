<?php
include("includes/header.php");
?>

<section class="intro-section">
  <div class="text-content">
    <h2>درخشش خاص خود</h2>
    <h1><b>را جشن بگیرید!</b></h1>

    <p style="display: flex; align-items: center; flex-wrap: wrap; gap: 10px; line-height: 2;">
      در نارین، هر زیورآلات با دقت و ظرافت ساخته می‌شود؛ از اولین طراحی تا آخرین لمس، هر جزئیات با دستانی هنرمندانه و نگاهی عاشقانه شکل می‌گیرد.
      بسته‌بندی‌های ویژه ما، نه تنها یک محافظ برای هدیه، بلکه پیامی از دل به دل است. اینجا، هر خرید یک تجربه است؛ تجربه‌ای از زیبایی، اصالت، و احساسات.
      نارین بیش از یک فروشگاه است؛ نارین یک سفر به دنیای هنر و عاطفه است که داستان شما را زیباتر می‌سازد.

      <!-- دکمه کوچک و هم‌ردیف -->
      <a href="#products" class="inline-button">مشاهده محصولات</a>
    </p>
  </div>
</section>
 

<!-- بخش محصولات -->
<section id="products">
  <div style="width: 1500px; margin: 0px auto">
    <div class="title-header">
      <div class="title-img1">دسته بندی محصولات</div>
      <div class="title-img1-text">
        از میان بهترین ها بهترین هارا برای شما فراهم کرده ایم.
      </div>
    </div>

    <table class="mahsool1">
      <tbody>
        <tr>
          <td height="221">
            <a href="products.php?category=انگشتر">
              <img
                style="border-radius: 6px; transition: 0.3s"
                src="img/angoshtar.png"
                width="98%"
                height="221"
                alt="محصول انگشتر"
              />
            </a>
          </td>
          <td>
            <a href="products.php?category=گردنبند">
              <img
                style="border-radius: 6px; transition: 0.3s"
                src="img/gardanband.png"
                width="99%"
                height="221"
                alt="محصول گردنبند"
              />
            </a>
          </td>
          <td>
            <a href="products.php?category=گوشواره">
              <img
                style="border-radius: 6px; transition: 0.3s"
                src="img/goshvare.png"
                width="98%"
                height="221"
                alt="محصول گوشواره"
              />
            </a>
          </td>
          <td>
            <a href="products.php?category=پک">
              <img
                style="border-radius: 6px; transition: 0.3s"
                src="img/pak.png"
                width="99%"
                height="221"
                alt="محصول پک"
              />
            </a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<br />
<?php
// اتصال به دیتابیس
$link = mysqli_connect("localhost", "root", "", "narinshop");
mysqli_set_charset($link, "utf8mb4");
if (mysqli_connect_errno()) exit(mysqli_connect_error());

// گرفتن 4 محصول جدید بر اساس pro_code (فرضا عددی یا رشته‌ای که مرتب‌سازی داره)
$query = "SELECT * FROM products ORDER BY pro_code DESC LIMIT 4";
$result = mysqli_query($link, $query);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

// جابجایی تصادفی محصولات برای نمایش متفاوت هر بار
shuffle($products);
?>

<!-- بخش نمایش محصولات -->
<div class="title-header">
  <div class="title-img1">جدیدترین‌ها در نارین</div>
  <div class="title-img1-text">بدرخش با جدیدترین های نارین</div>   
</div>

<div class="product-grid">
  <?php foreach ($products as $product): ?>
    <div class="product-card">
      <img src="img/products/<?php echo htmlspecialchars($product['pro_image']); ?>" alt="<?php echo htmlspecialchars($product['pro_name']); ?>" />
      <h3><?php echo htmlspecialchars($product['pro_name']); ?></h3>
      <p class="price"><?php echo number_format($product['pro_price']); ?> تومان</p>
      <a href="product_detail.php?id=<?php echo urlencode($product['pro_code']); ?>" class="buy-button">افزودن به سبد خرید</a>
    </div>
  <?php endforeach; ?>
</div>


<?php
include("includes/footer.php");
?>
