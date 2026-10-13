<?php
include $_SERVER['DOCUMENT_ROOT'] . "/clock/admin/class/user.php";
$arr = user::getInform();
?>
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="/clock/admin/main.php">Dashboard</a>
                </li>
                <li><i class="bx bx-chevron-right"></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class="bx bxs-cloud-download"></i>
            <span class="text">Download PDF</span>
        </a>
    </div>

    <ul class="box-info">
        <li>
            <i class="bx bxs-calendar-check"></i>
            <span class="text">
                <h3>
                    <?php
                    echo $arr["order_numbers"];

                    ?>
                </h3>
                <p>New Order</p>
            </span>
        </li>
        <li>
            <i class="bx bxs-group"></i>
            <span class="text">
                <h3>2834</h3>
                <p>Visitors</p>
            </span>
        </li>
        <li>
            <i class="bx bxs-dollar-circle"></i>
            <span class="text">
                <h3>$2543</h3>
                <p>Total Sales</p>
            </span>
        </li>
    </ul>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Orders</h3>
                <i class="bx bx-search"></i>
                <i class="bx bx-filter"></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date Order</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($arr["orders"] as $value) {
                    ?>
                        <tr>
                            <td>
                                <img src="img/people.png" alt="User Avatar" />

                                <p><?php echo $value["username"]; ?></p>
                            </td>
                            <td><?php echo $value["created_at"]; ?></td>
                            <td><span class="status completed"><?php echo $value["status"]; ?>
                                    <a href="/clock/admin/main.php?value=view_store&<?php echo $value["id_order"]; ?>">
                                        <!-- <span>kk</span> -->
                                    </a>

                            </td>
                            <td>
                                <a href="/clock/admin/main.php?value=view_order&id=<?php echo $value["id_order"]; ?>&id_user=<?php echo $value["id"]; ?>">
                                    <span>edit</span>
                                </a>

                            </td>
                        </tr>
                    <?php
                    }

                    ?>

                </tbody>
            </table>
        </div>
        <div class="todo">
            <div class="head">
                <h3>Todos</h3>
                <i class="bx bx-plus"></i>
                <i class="bx bx-filter"></i>
            </div>
            <ul class="todo-list">
                <li class="completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
                <li class="not-completed">
                    <p>Todo List</p>
                    <i class="bx bx-dots-vertical-rounded"></i>
                </li>
            </ul>
        </div>
    </div>
</main>