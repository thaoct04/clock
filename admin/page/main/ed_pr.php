<?php
include $_SERVER["DOCUMENT_ROOT"] . "/clock/admin/controller/edit_pr/update_pr.php";
?>
<main>
    <div class="product-edit">
        <div class="product-edit__relative-image">
            <h2>hình ảnh minh họa sản phẩm</h2>
            <div class="product-edit__relative-image__main"><img src="" alt=""></div>
            <form class="product-edit__relative-form" action="">
                <h2>file input</h2>
                <fieldset class="product-edit__relative-form__main">
                    <input type="text" placeholder="chosse file">
                    <button name="" class="btn-big">ok</button>
                </fieldset>
            </form>

        </div>
        <div class="product-edit__content">
            <h2>thông tin chính</h2>
            <form action="/clock/admin/controller/edit_pr/ed_pr.php?id=<?php echo $pr->id ?>" method="post" class="product-edit__content__form">
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập mã code của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-code" placeholder="<?php echo $pr->code; ?>">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp mẫu sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-model" placeholder="<?php echo $pr->model; ?>">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập tên sản phẩm

                    </legend>
                    <input type="text" name="product-edit__content__form__ip-name" placeholder="<?php echo $pr->name; ?>">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập loại sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-id-collection" placeholder="<?php echo $pr->collectionId; ?>">
                </fieldset>

                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập link video của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-video" placeholder="<?php echo $pr->videoPr; ?>">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập (Y-m-d H:i:s) phát hành sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-date-release" placeholder="<?php echo $pr->releaseDate; ?>">
                </fieldset>
                <button name="update_pr_admin" class="btn_big">update</button>
            </form>
        </div>
    </div>
</main>