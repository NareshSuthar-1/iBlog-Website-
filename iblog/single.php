<?php include "./header.php"; 
$get_post_id = $_GET['id'];
$sql = "SELECT * FROM post 
LEFT JOIN category ON post.catry = category.category_id 
LEFT JOIN data ON post.author = data.id WHERE post.post_id =  {$get_post_id}"
 or die("Query Failed");
$result = mysqli_query($conn,$sql) or die("Query Failed");

?>
<div class="container">
    <div class="post-left col">
<?php if(mysqli_num_rows($result)>0){

?>
        <div class="blog-container-single">
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <div class="blog">
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
                            <!-- 12 Nov -->
                        </div>
                    </div>
                    <div class="description">
                        <?php echo $row['descriptions']; ?>
                    </div>

                </div>

            </div>
            <?php  } ?>
        </div>
<?php }else {
    echo "No Such Post Found";
    mysqli_close($conn);
} ?>
    </div>
    <div class="post-right col">
        <div class="aside" style="margin-top: 14px;">
            <?php include "./aside.php"; ?>
        </div>
    </div>
</div>