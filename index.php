<?php
require('app/database/db.php');

$posts = selectAll('blog');
$categories = selectAll('category');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Welcome Page</title>

    <!-- CSS FILES -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/indexblogs.css" rel="stylesheet">

    <!-- JS FILES -->

</head>
<body>
    <!-- NAVIGATION BAR  START -->
    <?php include "includes/navbar.php"; ?>
    <!-- NAVIGATION BAR  END -->

    <!-- WELCOME BANNER STARTS -->
    <div class="banner">
        <img src="assets/images/banner.png" alt="Welcome Banner Image">
        <div class="banner-text">
            <h1>Welcome to BlogWise</h1>
            <p>Enjoy your stay and explore our content.</p>
        </div>
    </div>
    <!-- WELCOME BANNER ENDS -->
    <div class="main-container">
        <!-- BLOG POSTS START-->
        <div class="blog-posts">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="blog-post">
                        <p><?php echo $post['date']; ?></p>
                        <h2><?php echo $post['title']; ?></h2>
                        <p><?php echo substr($post['body'], 0, 120) . '...'; ?></p>
                        <a href="blog_detail.php?id=<?php echo $post['id']; ?>" class="read-more-btn">Read More</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No blog posts found.</p>
            <?php endif; ?>
       
        
        </div>
        <!-- BLOG POSTS END -->
        <!-- CATEGORIES BLOCK START -->
        <div class="categories-block">
            <h3>Categories</h3>
            <ul class="category-list">
                <?php foreach ($categories as $category): ?>
                    <li>
                            <?php echo $category['name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- CATEGORIES BLOCK END -->
    </div>


    <!-- FOOTER START -->
    <?php include "includes/footer.php"; ?>
    <!-- FOOTER END -->
</body>
</html>