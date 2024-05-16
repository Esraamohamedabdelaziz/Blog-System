<?php
session_start(); 
include('admin/connectToDb.php');

if(isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$post_id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        echo "<div class='singlepost'>";
        echo "<h2>{$post['title']}</h2>";
        echo "<p> {$post['created_at']}</p>";
        echo "<p>{$post['content']}</p>";
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
            // User is admin
            echo "<a href='admin/editpost.php?id={$post['id']}'>Edit</a>";
            echo "<a href='admin/delete.php?id={$post['id']}'>Delete</a>";
        } else {
            // User is not admin
            echo "";
            echo "";
        }
        
        echo"</div>";
    } else {
        echo "Post not found.";
    }
} else {
    echo "Post ID not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post details</title>
    <style>
        .singlepost{
            border: 2px solid #009990;
            text-align: center;
            padding: 10px;
        }
        .singlepost a{
            display: inline-block;
            margin: 10px;
            border: 1px solid #aaa;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            min-width: 100px;
            padding: 10px;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<script>
function showAccessDeniedPopup() {
    alert("You don't have access to edit or delete this post.");
}
</script>
</body>
</html>
