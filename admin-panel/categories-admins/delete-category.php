<?php
require "../../config/config.php";
require "../layouts/header.php";
?>
<?php

if(isset($_GET['del_id'])){
         $id = $_GET['del_id'];
        $delete = $conn->prepare("DELETE FROM categories WHERE id = :id");
        $delete->execute([
            ':id'=> $id
        ]);
        header("Location: ".ADMINROOT."/categories-admins/show-categories.php");
}else{
    die("404");
}

?>
