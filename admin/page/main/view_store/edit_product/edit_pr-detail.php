<main>
    <div class="product-edit">
        <div class="product-edit__relative-image">
            <h2>hình ảnh minh họa sản phẩm</h2>
            <div class="product-edit__relative-image__main"><img src="" alt=""></div>
            <form class="product-edit__relative-form" action="/clock/admin/controller/handel_form_pr_detail.php">
                <h2>file input</h2>
                <fieldset class="product-edit__relative-form__main">
                    <input type="text" placeholder="chosse file">
                    <button name="" class="btn-big">ok</button>
                </fieldset>
            </form>

        </div>
        <div class="product-edit__content">
            <h2>thông tin chính</h2>
            <form action="/clock/admin/controller/handel_form_pr/handel_form_pr_detail.php" method="post" class="product-edit__content__form">
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp id của sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-id-pr" placeholder=" mời nhâp id của sản phẩm sẽ nhận những thông tin này">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp kích thước sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-size" placeholder="mời nhập kích thước sản phẩm sản phẩm">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp chất liệu sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-material" placeholder="mời nhập chất liệu sản phẩm sản phẩm">
                </fieldset>
                <fieldset class="product-edit__content__form__video">
                    <legend>
                        mời nhâp độ chống nước sản phẩm
                    </legend>
                    <input type="text" name="product-edit__content__form__ip-resitant-watter" placeholder="mời nhập độ chống nước của sản phẩm">
                </fieldset>

                <button name="product-edit__content__form__btn" class="btn_big">xử lý</button>
            </form>
        </div>
    </div>
</main>