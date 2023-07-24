<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- CSS FILES -->
    <link href="assets/css/contact.css" rel="stylesheet">
</head>
<body>
    <!-- NAVIGATION BAR  START -->
    <?php include "includes/navbar.php"; ?>
    <!-- NAVIGATION BAR  END -->
    <!-- CONTENT START -->
    <main>
        <section class="contact-form">
        <h2>Get in touch with us</h2>
        <form action="message_form.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Submit</button>
        </form>
        </section>
    </main>
    <!-- CONTENT END -->


    <!-- FOOTER START -->
    <?php include "includes/footer.php"; ?>
    <!-- FOOTER END -->

</body>
</html>