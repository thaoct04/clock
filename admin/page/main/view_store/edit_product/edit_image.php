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
            <form action="/clock/admin/controller/handel_form_pr/hande_form_pr_img.php" method="post" class="product-edit__content__form">
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp id của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-id-pr" placeholder=" mời nhâp id của sản phẩm sẽ nhận những thông tin này">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp hình ảnh chính của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-img-main" placeholder="mời nhập link hình ảnh đồng hồ chính">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp hình ảnh mặt đồng hồ
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-img-dial" placeholder="mời nhập mô tả đơn giản về hình ảnh mặt đồng hồ">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp mô tả đơn giản về hình ảnh dây đeo đồng hồ
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-img-bracelet" placeholder="mời nhập mô tả đơn giản về hình ảnh dây đeo đồng hồ">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp mô tả đơn giản về vỏ đồng hồ
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-img-case" placeholder="mời nhập mô tả đơn giản về hình ảnh vỏ đồng hồ">
                </fieldset>
                <button name="product-edit__content__form__btn" class="btn_big">xử lý</button>
            </form>
        </div>
    </div>
</main>