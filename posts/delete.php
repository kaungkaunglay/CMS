<?php
require "../includes/header.php";
require "../config/config.php";
?>

<?php
    if(isset($_GET['del_id'])){
        $id = $_GET['del_id'];
        $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
        $select->execute();
        $post = $select->fetch(PDO::FETCH_OBJ);
        if($_SESSION['user_id'] !== $post->user_id)
        {
            header("Location: ".ROOT."/index.php") ;
        }else{
            unlink("images/".$post->img);

            $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");
            $delete->execute([
                ':id'=> $id
            ]);
            header("Location: ".ROOT."/index.php");
        }
    }else{
        header("Location: ".ROOT."/404.php");
    }

?>
