<?php
require "layouts/header.php";
require "../config/config.php";
    if(!isset($_SESSION['adminname'])){
        header("Location: ".ADMINROOT."/admins/login-admins.php");
    }
    //select admin
    $select = $conn->query("SELECT COUNT(*) AS admins_numbers FROM admins");
    $select->execute();
    $admins = $select->fetch(PDO::FETCH_OBJ);
    //select categories
    $select_cat = $conn->query("SELECT COUNT(*) AS cat_numbers FROM categories");
    $select_cat->execute();
    $categories = $select_cat->fetch(PDO::FETCH_OBJ);
    //select posts
    $select_posts = $conn->query("SELECT COUNT(*) AS posts_numbers FROM posts");
    $select_posts->execute();
    $posts = $select_posts->fetch(PDO::FETCH_OBJ);
?>
            
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Posts</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of posts: <?php echo $posts->posts_numbers ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $categories->cat_numbers; ?></p>
              <?php
              echo $_SESSION['adminname'];
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $admins->admins_numbers ?></p>
              
            </div>
          </div>
        </div>

<?php require "layouts/footer.php"?>