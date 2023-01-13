<?php
require "../../config/config.php";
?>
<?php
    if(!isset($_SESSION['adminname'])){
        header("Location: ".ADMINROOT."/admins/login-admins.php");
    }
    if(isset($_GET['id']) AND isset($_GET['status'])){
        $id = $_GET['id'];
        $status = $_GET['status'];
        if($status == 0)
        {
            $update = $conn->prepare("UPDATE posts SET status = 1 WHERE id= '$id'");
        }else{
            $update = $conn->prepare("UPDATE posts SET status = 0 WHERE id= '$id'");
        }
        $update->execute();
        header("Location: ".ADMINROOT."/posts-admins/show-posts.php");
    }
?>
