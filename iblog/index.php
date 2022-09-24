<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i-Blog</title>
    <link rel="stylesheet" href="./css/style.css"> -->
    <?php
    // if(header("location: http://localhost/curdphp/single.php?id=")){
    //     echo '<link rel="stylesheet" href="./css/singlePageStyle.css">';
    // }
    ?>
<!-- </head>

<body> -->
    <?php
    include "./header.php";
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
    $sql = "SELECT * FROM post
     LEFT JOIN category ON post.catry = category.category_id
     LEFT JOIN data ON post.author = data.id
     ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
    $Result = mysqli_query($conn, $sql);
    ?>

    <!-- maiiiiii------------------------- -->
    <div class="container">
        <div class="post-left col">
            <!-- <div class="Category-Title">
                Category Name
            </div> -->
            <div class="blog-container">
                <?php if (mysqli_num_rows($Result) > 0) {
                    while ($row = mysqli_fetch_assoc($Result)) {
                ?>
                        <div class="blog" style="height:184px">
                            <a class="blog-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                                <img src="./admin/uplodeIMG/<?php echo $row['post_img'] ?>" alt=""></a>
                            <div class="blog-content">
                                <a class="blog-title" href="single.php?id=<?php echo $row['post_id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a>
                                <div class="about-blog">
                                    <a class="blog-category" href="./category.php?cat_id=<?php echo $row['category_id']; ?>">
                                        <i class="fas fa-link" style="font-size: .7rem;"></i>
                                        <?php echo $row['c_name']; ?>
                                    </a>
                                    <div class="blog-autor">
                                        <i class="fas fa-user"></i>
                                        <?php echo $row['name']; ?>
                                    </div>

                                    <div class="date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?php echo $row['post_date']; ?>
                                    </div>
                                </div>
                                <div class="description">
                                    <?php echo $row['descriptions']; ?>
                                </div>
                                <a class="read-more " href="single.php?id=<?php echo $row['post_id']; ?>">
                                    Read More
                                </a>
                            </div>

                        </div>
                <?php }
                } else {
                    echo "<p class='alert'>No Post Found.</p>";
                }  ?>
                <?php
                // pagination php code--------
                $SQL = "SELECT * FROM post";
                $result2 = mysqli_query($conn, $SQL) or die("failed");
                if (mysqli_num_rows($result2) > 0) {

                    $total_recods = mysqli_num_rows($result2);
                    $total_page = ceil($total_recods / $limit);
                    echo '<ul class="pagination">';
                    // previous page PAGINATION BTN CODE---show this when page no > 1

                    if ($page > 1) {
                        echo '<li class="page-li"><a href="./index.php?page=' . ($page - 1) . '" >Prev</a></li>';
                    }
                    for ($i = 1; $i <= $total_page; $i++) {
                        // Adding Active class
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="page-li"><a class="' . $active . '" href="./index.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    // next page PAGINATION BTN CODE---- show this when page < total_page
                    if ($total_page > $page) {
                        echo '<li class="page-li"><a href="./index.php?page=' . ($page + 1) . '">Next</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
        <div class="post-right col">
            <div class="aside" style="margin-top: 10px;">
                <?php
                include "./aside.php";
                ?>
            </div>
        </div>
    </div>

    <?php
    include "./footer.php";
    ?>
<!-- </body>

</html> -->