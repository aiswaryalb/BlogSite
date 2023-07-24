<?php
require('app/database/db.php');

$posts = selectAll('blog');

if (isset($_GET['category']))
{
    $catID = $_GET['category'];
    $category = selectOne('category', ['id' => $catID]);
    $filteredPosts = selectAll('blog', ['category_id' => $catID]);
}
else
{
    $categories = selectAll('category');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="assets/css/indexblogs.css" rel="stylesheet">

</head>
<body>
     <!-- NAVIGATION BAR  START -->
     <?php include "includes/navbar.php"; ?>
    <!-- NAVIGATION BAR  END -->

    <div class="main-container">
        <!-- BLOG POSTS START-->
        <div class="blog-posts">
            <?php if (!empty($filteredPosts)): ?>
                <?php foreach ($filteredPosts as $post): ?>
                    <div class="blog-post">
                        <p><?php echo $post['date']; ?></p>
                        <h2><?php echo $post['title']; ?></h2>
                        <p><?php echo substr($post['body'], 0, 120) . '...'; ?></p>
                        <a href="blog_detail.php?id=<?php echo $post['id']; ?>" class="read-more-btn">Read More</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No blogs to display.</p>
            <?php endif; ?>
        </div>
        <!-- BLOG POSTS END -->
        <!-- CATEGORIES BLOCK START -->
        <div class="categories-block">
            
            <?php if (isset($_GET['category']) && isset($category)): ?>
                <div class="selected-category">
                    <h3>Selected Category</h3>
                    <?php echo $category['name']; ?>
                </div>
            <?php else: ?>
                <div class="selected-category">
                    <h3>Categories</h3>
                    <h4>No category selected.</h4>
                    <ul class="category-list">
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="?category=<?php echo $category['id']; ?>">
                                    <?php echo $category['name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <!-- CATEGORIES BLOCK END -->
    </div>

    <!-- FOOTER START -->
    <?php include "includes/footer.php"; ?>
    <!-- FOOTER END -->
</body>
</html>