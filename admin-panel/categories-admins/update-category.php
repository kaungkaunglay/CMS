<?php
require "../layouts/header.php";
require "../../config/config.php";
?>
<?php
if(isset($_GET['upd_id'])) {
    $id = $_GET['upd_id'];
    //first query
    $select = $conn->query("SELECT * FROM categories WHERE id = '$id'");
    $select->execute();
    $rows = $select->fetch(PDO::FETCH_OBJ);
//    if($_SESSION['user_id'] !== $rows->user_id){
//        header("Location: ".ROOT."/index.php");
//    }
    // second query
    if (isset($_POST['submit'])) {
        if (empty($_POST['name'])) {
            echo "<div class='alert alert-danger text-center text-white' role='alert'>Enter Data into inputs</div>";
        } else {
            $name = $_POST['name'];
            $update = $conn->prepare("UPDATE categories SET name =  :name WHERE id = '$id'");
            $update->execute([
                ':name' => $name
            ]);
            header("Location: " . ADMINROOT . "/categories-admins/show-categories.php");
        }
    }
}else{
   die("404");
}

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="update-category.php?upd_id=<?php echo $rows->id ?>" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input value="<?php echo $rows->name; ?>" type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php";  ?>