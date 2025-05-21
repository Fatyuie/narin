<?php
include("includes/header.php");
?>

<section class="intro-section">
  <div class="text-content">
    <h2>درخشش خاص خود</h2>
    <h1 style="font-size: 60px; font-weight: bold; margin: 30px 0px;">را جشن بگیرید!</h1>

    <p
      style="
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        line-height: 2;
      "
    >
      در نارین، هر زیورآلات با دقت و ظرافت ساخته می‌شود؛ از اولین طراحی تا آخرین
      لمس، هر جزئیات با دستانی هنرمندانه و نگاهی عاشقانه شکل می‌گیرد.
      بسته‌بندی‌های ویژه ما، نه تنها یک محافظ برای هدیه، بلکه پیامی از دل به دل
      است. اینجا، هر خرید یک تجربه است؛ تجربه‌ای از زیبایی، اصالت، و احساسات.
      نارین بیش از یک فروشگاه است؛ نارین یک سفر به دنیای هنر و عاطفه است که
      داستان شما را زیباتر می‌سازد.

      <!-- دکمه کوچک و هم‌ردیف -->
      <a href="#products" style=" margin-top: 20px;" class="inline-button">مشاهده محصولات</a>
    </p>
  </div>
  <div class="image-blob">
    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <clipPath id="blobClip">
          <path
            fill="#FFD6E8"
            d="M46.3,-71.9C60.2,-63,72,-50.6,77.9,-36.1C83.9,-21.5,84,-4.7,81.4,11.5C78.8,27.7,73.5,43.4,63.6,55.4C53.6,67.3,39.1,75.5,24.2,77.9C9.2,80.4,-6.2,76.9,-21.9,73.1C-37.7,69.2,-53.7,64.8,-63.2,54.4C-72.6,44.1,-75.5,27.7,-78.5,10.9C-81.6,-5.9,-84.8,-23.1,-80.7,-38.8C-76.6,-54.6,-65.1,-69,-50.4,-77.6C-35.7,-86.2,-17.9,-89.1,-0.9,-87.7C16.1,-86.4,32.3,-80.9,46.3,-71.9Z"
            transform="translate(100 100)"
          />
        </clipPath>
      </defs>
      <image
        xlink:href="img/2.jpg"
        width="100%"
        height="100%"
        clip-path="url(#blobClip)"
        preserveAspectRatio="xMidYMid slice"
      />
    </svg>
  </div>
</section>
<<<<<<< HEAD
=======
<section> 
<div class="image-blob">
    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <clipPath id="blobClip">
          <path fill="#FFD6E8"
            d="M46.3,-71.9C60.2,-63,72,-50.6,77.9,-36.1C83.9,-21.5,84,-4.7,81.4,11.5C78.8,27.7,73.5,43.4,63.6,55.4C53.6,67.3,39.1,75.5,24.2,77.9C9.2,80.4,-6.2,76.9,-21.9,73.1C-37.7,69.2,-53.7,64.8,-63.2,54.4C-72.6,44.1,-75.5,27.7,-78.5,10.9C-81.6,-5.9,-84.8,-23.1,-80.7,-38.8C-76.6,-54.6,-65.1,-69,-50.4,-77.6C-35.7,-86.2,-17.9,-89.1,-0.9,-87.7C16.1,-86.4,32.3,-80.9,46.3,-71.9Z"
            transform="translate(100 100)" />
        </clipPath>
      </defs>
      <image xlink:href="img/2.jpg" width="100%" height="100%" clip-path="url(#blobClip)" preserveAspectRatio="xMidYMid slice" />
    </svg>
  </div>
</section>
 
>>>>>>> e653a85c83f2513bc03015736d8453be00b837e5

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
<div style="margin-top: 80px" class="title-header">
  <div class="title-img1">جدیدترین‌ها در نارین</div>
  <div class="title-img1-text">بدرخش با جدیدترین های نارین</div>
</div>

<div class="product-grid">
  <?php foreach ($products as $product): ?>
  <div class="product-card">
    <img
      src="img/products/<?php echo htmlspecialchars($product['pro_image']); ?>"
      alt="<?php echo htmlspecialchars($product['pro_name']); ?>"
    />
    <h3><?php echo htmlspecialchars($product['pro_name']); ?></h3>
    <p class="price">
      <?php echo number_format($product['pro_price']); ?>
      تومان
    </p>
    <a
      style="font-size: 14px"
      href="product_detail.php?id=<?php echo urlencode($product['pro_code']); ?>"
      class="buy-button"
      >افزودن به سبد خرید</a
    >
  </div>
  <?php endforeach; ?>
</div>

<?php
include("includes/footer.php");
?>
