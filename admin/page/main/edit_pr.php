<div class="table-container">
    <h2 class="table-title">Bảng Quản Lý Sản Phẩm</h2>
    <table class="product-table">
        <thead>
            <tr>
                <!-- <th class="column-number">#</th> -->
                <th>id_product</th>
                <th>name_product</th>
                <th>date_release_clock</th>
                <th>model_watch</th>
                <th>code_clock</th>
                <th>id_collection</th>
                <th>video_pr</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/clock/admin/controller/edit_pr/edit_pr.php";
            foreach ($arrs as $arr) {
            ?>


                <tr>
                    <td class="column-number"><?php echo $arr->id ?></td> <!-- Sử dụng "->" để truy cập thuộc tính của đối tượng -->
                    <!-- <?php $ids = $arr->id; ?> -->
                    <td><?php echo $arr->name ?></td>
                    <td><?php echo $arr->releaseDate ?></td>
                    <td><?php echo $arr->model ?></td>
                    <td><?php echo $arr->code ?></td>

                    <td><?php echo $arr->collectionId ?></td>
                    <td><a href="#" class="video-link"><?php echo $arr->videoPr ?></a></td>
                    <td>
                        <a href="/clock/admin/main.php?value=ed_pr&id=<?php echo $ids; ?>" class="btn btn-edit">Sửa</a>
                        <a href="/clock/admin/controller/edit_pr/delete_pr.php?id=<?php echo $ids; ?>" class="btn btn-delete">Xóa</a>

                    </td>
                </tr>
            <?php
            }
            ?>

            <!-- Add more rows here -->
        </tbody>
    </table>
</div>