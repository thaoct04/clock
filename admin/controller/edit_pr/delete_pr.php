<?php
include $_SERVER['DOCUMENT_ROOT'] . "/clock/class/product.php";
$arrs = Product::delete_pr($_GET["id"]);
header("Location:/clock/admin/main.php?value=edit_pr");
