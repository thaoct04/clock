<?php
if (isset($_POST["search"])) {
    $search = $_POST["search"];
}
?>
<div class="list-pr">
    <div class="list-prs">
        <div class="list-pr-item">
            <div class="list-pr-item-search">
                <form action="/clock/index.php?search=ok" method="post" class="form-search">
                    <input class="ip-search" type="text" name="search" placeholder="tiềm kiếm đồng hồ">

                    <button class="btn-search" type="submit">
                        <i class="fa-light fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="list-pr-item-main">
                <div class="grid">
                    <?php
                    // include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/function.php";
                    search($search);
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>