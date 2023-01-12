<?php
require "../includes/header.php";
require "../config/config.php";
?>
<?php
        // select category
        $categories = $conn->query("SELECT * FROM categories");
        $categories->execute();
        $category = $categories->fetchAll(PDO::FETCH_OBJ);
    if(!isset($_SESSION['username'])){
        header("Location: ".ROOT."/index.php");
    }
    if(isset($_POST['submit'])){
        if(empty($_POST['title']) OR empty($_POST['subtitle']) OR empty($_POST['body']) OR empty($_POST['category']))
        {
            echo "<div class='alert alert-danger text-center text-white' role='alert'>Enter data into input</div>";
        }else{
            $title = $_POST['title'];
            $subtitle = $_POST['subtitle'];
            $body = $_POST['body'];
            $category_id = $_POST['category'];
            $img = $_FILES['img']['name'];
            $user_name = $_SESSION['username'];

            $user_id = $_SESSION['user_id'];
            $dir = "images/".basename($img);       //take the name of image;
            $insert = $conn->prepare("INSERT INTO posts (title, subtitle, body, category_id, img, user_id, username) VALUES (:title, :subtitle, :body, :category_id , :img, :user_id, :username)");
            $insert->execute([
                    ':title' => $title,
                    ':subtitle' => $subtitle,
                    ':body' => $body,
                    ':category_id' => $category_id,
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
                    <select name="category" required class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <?php
                        foreach($category as $cat):
                        ?>
                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                        <?php endforeach; ?>
                    </select>
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
