<?php require "../includes/header.php"; ?>
<?php require "../config/config.php" ;?>
<?php
    if(isset($_POST['submit'])){
        if(empty($_POST['email']) OR empty($_POST['username'])){
            echo "<div class='alert alert-danger text-center text-white' role='alert'>Enter data into input</div>";
        }else{
            // get user inputs
            $email = trim($_POST['email']);
            $username = trim( $_POST['username']);
            $password  = trim(password_hash($_POST['password'],PASSWORD_DEFAULT)) ;
           //insert data
            $insert = $conn->prepare("INSERT INTO users (email, username, password) VALUES (:email, :username, :password)");
            $insert->execute([
                   ":email" => $email,
                   ":username" => $username,
                   ":password" => $password
            ]);
            header("Location: login.php");
        }
    }
?>
            <form method="POST" action="register.php">

<!--                Username input-->
                <div class="form-outline mb-4">
                    <input required type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" />
                </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input  required type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>



              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.html">Login</a></p>
                

               
              </div>
            </form>
            <?php require "../includes/footer.php" ?>