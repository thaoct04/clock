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
            <form action="/clock/admin/controller/handel_form_pr/handel_form_pr_img_dt.php" method="post" class="product-edit__content__form">
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp id của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-id-pr" placeholder=" mời nhâp id của sản phẩm sẽ nhận những thông tin này">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>mời nhập list ảnh chi tiết sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-img-list" placeholder=" mời nhâp list hình ảnh chi tiết sản phẩm">
                </fieldset>

                <button name="product-edit__content__form__btn" class="btn_big">đồng ý</button>
            </form>
        </div>
    </div>
</main>