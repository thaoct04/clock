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
            <form action="/clock/admin/controller/handel_new/handel_form_img_news.php" method="post" class="product-edit__content__form">
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập id tin tức
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-id_news" placeholder="mời nhập tên news">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập hình ảnh chính của tin tức
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-img-main-detail-new" placeholder=" mời nhập mô tả đơn giản news">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập link video
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-video-main-detail-new" placeholder=" mời nhập mô tả đơn giản news">
                </fieldset>
                <button name="product-edit__content__form__btn" class="btn_big">xử lý</button>
            </form>
        </div>
    </div>
</main>