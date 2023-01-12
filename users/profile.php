<?php
require "../includes/header.php" ;
require "../config/config.php";
?>
<?php
if(isset($_GET['prof_id'])) {
    $id = $_GET['prof_id'];
    //first query
    $select = $conn->query("SELECT * FROM users WHERE id = '$id'");
    $select->execute();
    $rows = $select->fetch(PDO::FETCH_OBJ);

    if($_SESSION['user_id'] !== $rows->id){
        header("Location: ".ROOT."/index.php");
    }
    // second query
    if (isset($_POST['submit'])) {
        if (empty($_POST['email']) OR empty($_POST['username'])) {
            echo "<script>alert('one or more inputs are empty')</script>";
        } else {
            $email = $_POST['email'];
            $username = $_POST['username'];
            //image
            $img = $_FILES['img']['name'];
            $dir = "images/".basename($img);

            $update = $conn->prepare("UPDATE users SET email =  :email, username = :username WHERE id='$id'");
            $update->execute([
                ':email' => $email,
                ':username' => $username,
            ]);
            header("Location: ".ROOT."/users/profile.php?prof_id=".$_SESSION['user_id']);
        }
    }
}
?>
<form enctype="multipart/form-data" method="POST" action="profile.php?prof_id=<?php echo $rows->id;?>">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" name="email" id="form2Example1" class="form-control" value="<?php echo $rows->email; ?>" placeholder="Email" />

    </div>

    <div class="form-outline mb-4">
        <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" value="<?php echo $rows->username; ?>" />
    </div>

    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


</form>


<?php
require "../includes/footer.php";
?>
