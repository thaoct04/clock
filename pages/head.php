<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$content = $content ?? null;
$id_newss = $id_newss ?? null;
$isLoggedIn = isset($_SESSION["user_id"]);

if (
  $content == "news" ||
  $content == "watch_order_detail" ||
  $content == "user" ||
  $content == "information_write" ||
  $content == "information" ||
  $content == "fogetPass" ||
  $content == "registration" ||
  $content == "pay" ||
  $content == "cart" ||
  ($content == "newsPage" && $id_newss == 2)
) {
?>
  <header class="header" style="color: black;">
    <div class="head-nv">
      <div class="header-nav">
        <div class="header-nav-block1">
          <i class="fa-sharp fa-light fa-globe" style=" color: black;"></i>
          <a href="/clock/index.php?danhmuc=clock hide-on-mobile" style="color: black;">
            <h4>Watches</h4>
          </a>
          <a href="/clock/index.php?danhmuc=news" class="hide-on-mobile">
            <h4 style="color: black;">News</h4>
          </a>
          <a href="/clock/index.php?danhmuc=map">
            <h4 class="kds hide-on-mobile" style="text-decoration:none">map</h4>
          </a>
        </div>
        <a href="/clock/index.php" style="color: black;">
          <img
            class="header-nav-img"
            src="https://www.audemarspiguet.com/etc.clientlibs/ap-com/ui/clientlibs/publish/resources/static/audemars-piguet-logo.svg"
            alt="" />
        </a>
        <div class="header-nav-block2" style="color: black;">
          <!-- <a href="/clock/index.php?danhmuc=map">
            <h4 class="kds hide-on-mobile" style="text-decoration:none">map</h4>
          </a> -->
          <?php if ($isLoggedIn): ?>
            <h2 style="margin-right: 20px;"><a class="bb" href="/clock/pages/main/log_out.php">log out</a></h2>
          <?php else: ?>
            <h2 style="margin-right: 20px;"><a class="bb" href="/clock/index.php?danhmuc=user">log in</a></h2>
          <?php endif; ?>

          <a class="kds" href="/clock/index.php?danhmuc=information<?= $isLoggedIn ? '&amp;id=' . rawurlencode((string) $_SESSION['user_id']) : '' ?>">
            <h4 class="hide-on-mobile">information</h4>
          </a>
          <a class="kds hide-on-mobile" href="/clock/index.php?danhmuc=user"><i class="fa-light fa-user head_user kds"></i></a>
          <a class="kds" href="/clock/index.php?danhmuc=cart"><i class="fa-thin fa-cart-shopping kds"></i></a>
        </div>
      </div>
    </div>

  </header>
<?php
} else {

?>

  <header class="header">
    <div class="head-nv">
      <div class="header-nav">
        <div class="header-nav-block1">
          <i class="fa-sharp fa-light fa-globe"></i>
          <a href="/clock/index.php?danhmuc=clock" class="hide-on-mobile">
            <h4>Watches</h4>
          </a>
          <a class="hide-on-mobile" href="/clock/index.php?danhmuc=news">
            <h4>News</h4>
          </a>
          <a href="/clock/index.php?danhmuc=map">
            <h4 class="hide-on-mobile">map</h4>
          </a>
        </div>
        <a href="/clock/index.php">
          <img
            class="header-nav-img"
            src="https://www.audemarspiguet.com/etc.clientlibs/ap-com/ui/clientlibs/publish/resources/static/audemars-piguet-logo-white.svg"
            alt="" />
        </a>
        <div class="header-nav-block2 hide-on-mobile">
          <!-- <h4 class="hide-on-mobile">Services</h4> -->
          <?php if ($isLoggedIn): ?>
            <h2 style="margin-right: 20px;"><a class="bb" href="/clock/pages/main/log_out.php">log out</a></h2>
          <?php else: ?>
            <h2 style="margin-right: 20px;"><a class="bb" href="/clock/index.php?danhmuc=user">log in</a></h2>
          <?php endif; ?>
          <a class="kks" href="/clock/index.php?danhmuc=information<?= $isLoggedIn ? '&amp;id=' . rawurlencode((string) $_SESSION['user_id']) : '' ?>">
            <h4 class="hide-on-mobile">information</h4>
          </a>
          <a class="kks hide-on-mobile" href="/clock/index.php?danhmuc=user"><i class="fa-light fa-user head_user"></i></a>
          <a class="kks" href="/clock/index.php?danhmuc=cart"><i class="fa-thin fa-cart-shopping"></i></a>
        </div>
      </div>
    </div>
    <div class="header-bg">
      <div class="video-head__background">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/head/headvd.php";

        ?>
        <!-- autoplay="" -->

      </div>
      <div class="header-bg-block1 hide-on-mobile">
        <span>NEW FORGED <br />
          CARBON FOR</span>
        <span>THE ROYAL <br />
          OAK CONCEPT</span>
        <div class="header-bg-block1-learn">
          <span></span>
          <a href="">Discover more</a>
        </div>
      </div>
    </div>
  </header>
<?php
}
