<?php
require "../includes/header.php";
require "../config/config.php";
?>
<?php
    // Check for submit
    // Take the data
    // write our query
    // execute and then fetch
    // do our rowCount
    // do our password_verify + redirect to the index
    if(isset($_SESSION['username'])){
            header("Location".ROOT."/index.php");
    }
    if(isset($_POST['submit']))
    {
        if(empty($_POST['email']) OR empty($_POST['password'])){
            echo "<div class='alert alert-danger text-center text-white' role='alert'>Enter Data into inputs</div>";
        }else{
            $email = trim(htmlentities($_POST['email']));
            $password = trim(htmlentities($_POST['password']));

            $login = $conn->query("SELECT * FROM users WHERE email='$email'");
            $login->execute();
            $row = $login->fetch(PDO::FETCH_ASSOC);
            if($login->rowCount() > 0) {
                if(password_verify($password,$row["password"])){
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['id'];
                    header("Location: ".ROOT."/index.php");
                }else{
                    echo "<div class='alert alert-danger text-center' role='alert'>The email or password is wrong</div>";
                }
            }else{
               echo "<div class='alert alert-danger text-center' role='alert'>The email or password is wrong</div>";
            }
        }
    }
        ?>
               <form method="POST" action="login.php">
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

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>a new member? Create an acount<a href="register.php"> Register</a></p>
                  </div>
                </form>
            <?php
                require "../includes/footer.php";
            ?>