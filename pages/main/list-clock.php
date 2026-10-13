<?php

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

            <!-- <div class="filter">

                <i class="fa-sharp-duotone fa-solid fa-grid-2-plus"></i>
                <span>bộ lọc</span>
                <?php
                include $_SERVER["DOCUMENT_ROOT"] . "/clock/pages/main/bo_loc.php";
                ?>

            </div> -->
            <div class="list-pr-item-main">
                <div class="list-pr-item-main-title">
                    <h2>hoi huong hien dai</h2>
                </div>
                <div class="grid">
                    <?php
                    // include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/function.php";
                    displayClockMD();
                    ?>

                </div>
                <div class="list-pr-item-main-title">
                    <h2>xu huong co dien</h2>
                </div>
                <div class="grid">
                    <?php
                    // include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/function.php";
                    displayClockClassical();
                    ?>

                </div>
                <div class="list-pr-item-main-title">
                    <h2>phong cách thể thao năng động</h2>
                </div>
                <div class="grid">
                    <?php
                    // include $_SERVER['DOCUMENT_ROOT'] . "/clock/pages/main/function/function.php";
                    displayClockSport();
                    ?>

                </div>
            </div>


        </div>

    </div>

</div>