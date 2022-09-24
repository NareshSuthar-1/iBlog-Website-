<?php
include "./header.php";
if ($_SESSION["user_Role"] == "0") {
    header("location: $localhoat/Websit-post.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>
<link rel="stylesheet" href="./CSS.css">
<style>
    table {
        counter-reset: count-no;
    }

    .count::before {
        counter-increment: count-no;
        content: counter(count-no);
    }
</style>

<body>

    <div>
        <div class="page-title-bar">
            <p>ALL USERS</p>
            <a href="./add.php" target="_blank">Add New User</a>

        </div>
        <?php
        include "./connetion.php";
        // pagination code-------------------
        $limit = 3;
        $page;
        // seting Default when opening direct ---- INDEX.PHP FILE
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        // setting end
        $offset = ($page - 1) * $limit;

        // pagination code end--
        $getSQL = "SELECT * FROM data  ORDER BY id DESC LIMIT {$offset},{$limit}";
        $data = mysqli_query($conn, $getSQL);
        if (mysqli_num_rows($data) > 0) {
        ?>
            <table>
                <tr>
                    <th>Sr No.</th>
                    <th>User ID</th>
                    <th>NAME</th>
                    <th>User Role</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($data)) {
                ?>
                    <tr>
                        <td class="count"></td>

                        <td><?php echo $row['id']  ?>
                        </td>

                        <td><?php echo $row['name']  ?></td>
                        <td><?php echo $row['u_role']  ?></td>
                        <td> <a href="<?php echo "./update.php?id={$row['id']}" ?>" target="_blank" class="update">UPDATE</a>
                        </td>
                        <td> <a href="<?php echo "./delete.php?id={$row['id']}" ?>" target="_blank" class="delete">DELETE</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>
        <?php
        }


        // pagination php code--------
        $SQL = "SELECT * FROM data ";
        $result2 = mysqli_query($conn, $SQL) or die("failed");
        if (mysqli_num_rows($result2) > 0) {

            $total_recods = mysqli_num_rows($result2);
            $total_page = ceil($total_recods / $limit);
            echo '<ul class="pagination">';
            // previous page PAGINATION BTN CODE---show this when page no > 1

            if ($page > 1) {
                echo '<li class="page-li"><a href="./users.php?page=' . ($page - 1) . '" >Prev</a></li>';
            }
            for ($i = 1; $i <= $total_page; $i++) {
                // Adding Active class
                if ($i == $page) {
                    $active = "active";
                } else {
                    $active = "";
                }
                echo '<li class="page-li"><a class="' . $active . '" href="./users.php?page=' . $i . '">' . $i . '</a></li>';
            }
            // next page PAGINATION BTN CODE---- show this when page < total_page
            if ($total_page > $page) {
                echo '<li class="page-li"><a href="./users.php?page=' . ($page + 1) . '">Next</a></li>';
            }
            echo '</ul>';
        }
        ?>
    </div>

</body>

</html>