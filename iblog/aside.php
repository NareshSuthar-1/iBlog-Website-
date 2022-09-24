<!-- <div class="serch-box">
    <div class="title">
        Search
    </div>
    <div class="input-box">
        <input type="search" name="seach" id="search" placeholder="Search..">
    </div>
</div>
<div class="recent-blog">
    <div class="title">
        Recant Post
    </div>
</div> -->


<div class="serch-box">
    <div class="title">
        Search
    </div>
    <div class="input-box">
        <form action="./search.php?search=" method="get" id="SeachForm">
            <input type="search" name="search" id="search" placeholder="Search....">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </div>
</div>
<div class="recent-blog">
    <div class="title">
        Recant Post
    </div>
    <?php
    $limit = 5;
    $Recent_Qy = "SELECT * FROM post
    LEFT JOIN category ON post.catry = category.category_id
    LEFT JOIN data ON post.author = data.id
    ORDER BY post.post_id DESC LIMIT {$limit} "or die("Query Failed : Recent Post");
   $Recent = mysqli_query($conn, $sql) or die("Query Failed : Recent Post");
    ?>
    <div class="rect-blog-container">
        <?php 
        if(mysqli_num_rows($Recent)>0){

        while($row_recent = mysqli_fetch_assoc($Recent)){
        ?>
        <div class="blog-rect">
            <a class="blog-img" href="single.php?id=<?php echo $row_recent['post_id']; ?>">
                <img src="./admin/uplodeIMG/<?php echo $row_recent['post_img'] ?>" alt=""></a>

            <div class="blog-content">
                <a class="blog-title" href="single.php?id=<?php echo $row_recent['post_id']; ?>">
                    <?php echo $row_recent['title']; ?>
                </a>
                <div class="about-blog">
                    <a class="blog-category" href="./single.php?id=<?php echo $row['post_id']; ?>">
                    <i class="fas fa-link" style="font-size: .7rem;"></i>
                        <?php echo $row_recent['c_name']; ?>
                    </a>

                    <div class="date">
                        <i class="far fa-calendar-alt"></i>
                        <?php echo $row_recent['post_date']; ?>
                    </div>
                </div>
            
                <a class="read-more " href="single.php?id=<?php echo $row_recent['post_id']; ?>">
                    Read More
                </a>
            </div>
        </div>
        <?php
        }}
        else{
            echo "No Recent Post";
        }
        ?>
    </div>
</div>