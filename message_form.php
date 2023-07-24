<?php
require('app/database/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);

    if (mysqli_stmt_execute($stmt)) 
    {
        $inserted_id = mysqli_insert_id($conn);
        echo "<script>";
        echo "alert('Message sent successfully!');";
        echo "window.location.href = 'contact.php';";
        echo "</script>";
        exit(); 
    } 
    else 
    {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);


?>
