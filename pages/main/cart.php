<?php
// session_start();
?>

<div class="cart">
    <table class="cart-table">
        <thead>
            <tr>
                <td><input type="checkbox"></td>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Số tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody class="cart-table-body">
            <?php
            if (isset($_SESSION["user_id"]) && isset($_SESSION["cart"][$_SESSION["user_id"]])) {
                $id = $_SESSION["user_id"];
                $content = $_SESSION["cart"][$id];

                if ($content == null) {
                    $content = [];
                }

                foreach ($content as $item) {
                    include_once $_SERVER['DOCUMENT_ROOT'] . "/clock/class/cart.php";
                    $item = unserialize($item);
                    $id_cart = $item->id_pr;
            ?>
                    <tr class="cart-item">
                        <td>
                            <input type="checkbox" name="product[]" class="product-checkbox" id="product<?php echo $item->id_pr; ?>" value="<?php echo $item->id_pr; ?>">
                        </td>
                        <td>
                            <div class="cart-item-details">
                                <img class="product-image" src="<?php echo $item->image_main; ?>" alt="">
                                <div class="product-info">
                                    <h2 class="product-name"><?php echo $item->name_product; ?></h2>
                                    <p class="product-date"><?php echo $item->date_release_clock; ?></p>
                                    <p class="product-description"><?php echo $item->describe_sample; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input class="quantity-input" type="number" value="1" min="1" data-id="<?php echo $item->id_pr; ?>">
                        </td>
                        <td class="product-cost"><?php echo $item->cost; ?></td>
                        <td>
                            <a class="delete-link" href="/clock/controller/cart/delete_item_cart.php?id=<?php echo $id_cart; ?>">Xóa</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <?php
    if ($_SESSION["check_full_inform"] === true) {
        echo "Tồn tại thông tin đầy đủ.";
    } else {
        echo "Không tồn tại thông tin.";
    }
    ?>
    <!-- <?php echo $_SESSION["user_id"];  ?> -->
    <footer class="cart-footer">
        <button type="submit" class="btn_big">mua ngay</button>
    </footer>
</div>



<script>
    // Gán biến PHP vào JavaScript
    const checkInformFull = <?php echo json_encode($_SESSION["check_full_inform"]); ?>;

    document.querySelector('.cart-footer button[type="submit"]').addEventListener('click', function(event) {
        event.preventDefault();

        // Kiểm tra thông tin đầy đủ
        if (!checkInformFull) {
            alert("Vui lòng điền đầy đủ thông tin trước khi đặt hàng ");
            return;
        }

        const selectedProducts = [];

        // Duyệt qua các checkbox đã được chọn
        document.querySelectorAll('.product-checkbox:checked').forEach(checkbox => {
            const productId = checkbox.value;

            // Tìm input số lượng liên quan (có cùng data-id)
            const quantityInput = document.querySelector(`.quantity-input[data-id="${productId}"]`);
            const quantity = quantityInput ? quantityInput.value : 1;

            // Thêm sản phẩm và số lượng vào danh sách
            selectedProducts.push({
                id: productId,
                quantity: quantity
            });
        });

        if (selectedProducts.length === 0) {
            alert('Vui lòng chọn ít nhất một sản phẩm!');
            return;
        }

        // Tạo form ẩn để gửi dữ liệu
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/clock/index.php?danhmuc=pay';

        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'products';
        hiddenInput.value = JSON.stringify(selectedProducts);

        form.appendChild(hiddenInput);
        document.body.appendChild(form);

        // Gửi form
        form.submit();
        alert("Thành công");
    });
</script>