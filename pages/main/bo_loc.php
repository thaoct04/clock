<div class="filter-it">
    <header class="filter__head">
        <span>bộ lọc</span>
        <span>x</span>

    </header>
    <ul class="filter__list">
        <li>
            <fieldset>
                <legend>
                    bộ sưu tập
                </legend>
                <label for="">
                    phong cách thể thao năng động
                    <input name="collection" value="phong cách thể thao năng động" type="checkbox">


                </label>
                <label for="">
                    xu hướng cổ điển

                    <input name="collection" value="xu hướng cổ điển" type="checkbox">
                </label>
                <label for="">
                    hơi hướng hiện đại

                    <input name="collection" value="hơi hướng hiện đại" type="checkbox">
                </label>
            </fieldset>
        </li>
        <li>
            <fieldset>
                <legend>
                    chức năng
                </legend>
                <label for="">
                    lên dây code
                    <input type="checkbox">


                </label>
                <label for="">
                    có dây code

                    <input type="checkbox">
                </label>
                <label for="">
                    tự đông

                    <input type="checkbox">
                </label>
            </fieldset>
        </li>
        <li>
            <fieldset>
                <legend>
                    kích thước

                </legend>
                <label for="">
                    < 30
                        <input type="checkbox">


                </label>
                <label for="">
                    30 > < 40

                        <input type="checkbox">
                </label>
                <label for="">
                    > 40

                    <input type="checkbox">
                </label>
            </fieldset>
        </li>
        <li>
            <fieldset>
                <legend>
                    vật liệu
                </legend>
                <label for="">
                    <input type="checkbox">


                </label>
                <label for="">

                    <input type="checkbox">
                </label>
                <label for="">

                    <input type="checkbox">
                </label>
            </fieldset>
        </li>

    </ul>
    <footer class="filter__footer">
        <div>xóa tất cả</div>
        <div>hiển thị </div>
    </footer>
</div>
<script>
    function getCheckedValues() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        const filters = {};
        checkboxes.forEach(checkbox => {
            const name = checkbox.name;
            if (!filters[name]) {
                filters[name] = [];
            }
            filters[name].push(checkbox.value);
        });
        return filters;
    }

    function applyFilters() {
        const filters = getCheckedValues();
        fetch('/clock/pages/main/function/lay_san_pham.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(filters),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Dữ liệu sản phẩm đã lọc
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function resetFilters() {
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => checkbox.checked = false);
    }
</script>