<?php
require "../includes/header.php";
require "../config/config.php";
?>
<?php
    if(isset($_POST['submit'])){
        if(empty($_POST['title']) OR empty($_POST['subtitle']) OR empty($_POST['body']))
        {
            echo "<script>alert('one or more inputs are empty')</script>";
        }else{
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $body = $_POST['body'];
            $img = $_FILES['img']['name'];// take the name of image;
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['username'];

            $dir = "images/".basename($img);
            $insert = $conn->prepare("INSERT INTO posts (title, subtitle, body, img, user_id, username) VALUES (:title, :subtitle, :body, :img, :user_id, :username)");
            $insert->execute([
                    ':title' => $title,
                    ':subtitle' => $subtitle,
                    ':body' => $body,
                    ':img' => $img,
                    ':user_id' => $user_id,
                    ':username'=> $user_name
            ]);
            //Move file into the folder
            if(move_uploaded_file($_FILES['img']['tmp_name'],$dir)){
                header("Location: ".ROOT."/index.php");
            }
        }
    }
?>
            <form method="post" action="create.php" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" />
            </div>

              <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"></textarea>
            </div>

              
             <div class="form-outline mb-4">
                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
            </form>


<?php
require "../includes/footer.php" ;
?>
