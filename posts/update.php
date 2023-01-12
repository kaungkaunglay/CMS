<?php
require "../includes/header.php" ;
require "../config/config.php";
?>
<?php
    if(isset($_GET['upd_id'])) {
        $id = $_GET['upd_id'];
        //first query
        $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
        $select->execute();
        $rows = $select->fetch(PDO::FETCH_OBJ);
        if($_SESSION['user_id'] !== $rows->user_id){
            header("Location: ".ROOT."/index.php");
        }
        // second query
        if (isset($_POST['submit'])) {
            if (empty($_POST['title']) or empty($_POST['subtitle']) or empty($_POST['body'])) {
                echo "<div class='alert alert-danger text-center text-white' role='alert'>Enter Data into inputs</div>";
            } else {
                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $body = $_POST['body'];
                //unlink image first
                unlink("images/".$rows->img);
                //image
                $img = $_FILES['img']['name'];
                $dir = "images/".basename($img);

                $update = $conn->prepare("UPDATE posts SET title =  :title, subtitle = :subtitle, body = :body, img = :img WHERE id = '$id'");
                $update->execute([
                    ':title' => $title,
                    ':subtitle' => $subtitle,
                    ':body' => $body,
                    ':img' => $img
                ]);
                if(move_uploaded_file($_FILES['img']['tmp_name'],$dir)){
                    header("Location: " . ROOT . "/index.php");
                }
            }
        }
    }else{
        header("Location: ".ROOT."/404.php");
    }
?>
            <form enctype="multipart/form-data" method="POST" action="update.php?upd_id=<?php echo $id;?>">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" id="form2Example1" class="form-control" value="<?php echo $rows->title; ?>" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" value="<?php echo $rows->subtitle; ?>" />
                </div>

              <div class="form-outline mb-4">
                  <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"><?php echo $rows->body; ?></textarea>
                </div>
                <img src="images/<?php echo $rows->img; ?>" alt="<?php echo $rows->img; ?>" width="900px" height="500px">


             <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


       <?php
       require "../includes/footer.php";
       ?>
