<?php
include "./header.php";
if (isset($_GET['cat_id'])) {
    $get_cat_id = $_GET['cat_id'];
}
$sql = "SELECT * FROM post
     LEFT JOIN category ON post.catry = category.category_id
     LEFT JOIN data ON post.author = data.id
     WHERE category_id = {$get_cat_id}
     ORDER BY post.post_id DESC";
$Result = mysqli_query($conn, $sql);
$Result2 = mysqli_query($conn, $sql);

$row2 = mysqli_fetch_assoc($Result2);
?>
<div class="container">
    <div class="post-left col">
        <div class="Category-Title">
            <?php echo $row2['c_name']; ?>
        </div>
        <div class="Category-blog">
            <?php if (mysqli_num_rows($Result) > 0) {
                while ($row = mysqli_fetch_assoc($Result)) {
            ?>
                    <div class="blog-cat">
                        <a class="blog-img" href="single.php?id=<?php echo $row['post_id']; ?>">
                            <img src="./admin/uplodeIMG/<?php echo $row['post_img'] ?>" alt=""></a>
                        <div class="blog-content">
                            <a class="blog-title" href="single.php?id=<?php echo $row['post_id']; ?>">
                                <?php echo $row['title']; ?>
                            </a>
                            <div class="about-blog">
                                <a class="blog-category" href="">
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
                                <?php echo substr($row['descriptions'], 0, 100); ?>

                            </div>
                            <a class="read-more " href="single.php?id=<?php echo $row['post_id']; ?>">
                                Read More
                            </a>
                        </div>

                    </div>
            <?php }
            } else {
                echo "No Such Post Found.";
            } ?>
        </div>

    </div>
    <div class="post-right col">
        <div class="aside">
            <?php
            include "./aside.php";
            ?>
        </div>
    </div>
</div>
<?php include "./footer.php"; ?>