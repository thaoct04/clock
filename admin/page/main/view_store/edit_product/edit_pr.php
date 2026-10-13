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
            <form action="/clock/admin/controller/handel_form_pr/handel_form.php" method="post" class="product-edit__content__form">
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập mã code của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-code" placeholder="mời nhập độ chống nước của sản phẩm">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp mẫu sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-model" placeholder=" mời nhâp id của sản phẩm sẽ nhận những thông tin này">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập tên sản phẩm

                    </legend>
                    <input type="text" name="product-edit__content__form__ip-name" placeholder="mời nhập tên sản phẩm">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập loại sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-id-collection" placeholder="mời nhập chất liệu sản phẩm sản phẩm">
                </fieldset>

                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập link video của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-video" placeholder="mời nhập độ chống nước của sản phẩm">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhập (Y-m-d H:i:s) phát hành sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-date-release" placeholder="mời nhập độ chống nước của sản phẩm">
                </fieldset>
                <button name="product-edit__content__form__btn" class="btn_big">xử lý</button>
            </form>
        </div>
    </div>
</main>