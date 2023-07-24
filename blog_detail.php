<?php
    require('app/database/db.php');
    if (isset($_GET['id'])) {
        $postId = $_GET['id'];
        $post = selectOne('blog', ['id' => $postId]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    
    <!-- CSS FILES -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/blogdetail.css" rel="stylesheet">

    <!-- JS FILES -->

</head>
<body>
    <!-- NAVIGATION BAR  START -->
     <?php include "includes/navbar.php"; ?>
    <!-- NAVIGATION BAR  END -->

    <!-- BLOG POST CONTENT START -->
    <div class = "blog-post">
        <h2><?php echo $post['title']; ?></h2>
        <p class = "post-date"><?php echo $post['date']; ?></p>
        <p><?php echo $post['body']; ?></p>
    </div>
    <!-- BLOG POST CONTENT END -->

    <!-- FOOTER START -->
    <?php include "includes/footer.php"; ?>
    <!-- FOOTER END -->

    
</body>
</html>