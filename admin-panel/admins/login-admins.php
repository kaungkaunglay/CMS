<?php
require "../layouts/header.php";
require "../../config/config.php";
?>
<?php
if(isset($_SESSION['adminname'])){
    header("Location".ADMINROOT."/index.php");
}
if(isset($_POST['submit']))
{
    if(empty($_POST['email']) OR empty($_POST['password'])){
        echo "<div class='alert alert-danger text-center text-white' role='alert'>Enter Data into inputs</div>";
    }else{
        $email = trim(htmlentities($_POST['email']));
        $password = trim(htmlentities($_POST['password']));

        $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
        $login->execute();
        $row = $login->fetch(PDO::FETCH_ASSOC);
        if($login->rowCount() > 0) {
            if(password_verify($password,$row["password"])){

                $_SESSION['adminname'] = $row['adminname'];
                $_SESSION['admin_id'] = $row['id'];

                header("Location: ".ADMINROOT."/index.php");
            }else{
                echo "<div class='alert alert-danger text-center' role='alert'>The email or password is wrong</div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center' role='alert'>The email or password is wrong</div>";
        }
    }
}
?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>
            </div>
       </div>
     </div>
    </div>
<?php require "../layouts/footer.php"?>