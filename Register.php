<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
    <!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
    <!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                <div class="text-center mb-3">
                    <a href="Login.php">
                        <button class="btn bg-danger text-white" style="width: 200px">Login</button>
                    </a>
                </div>
                <div class="text-center mb-3">
                    <a href="Logout.php">
                        <button class="btn bg-primary text-white" style="width: 200px">Logout</button>
                    </a>
                </div>
                <div class="text-center mb-3">
                    <a href="Register.php">
                        <button class="btn bg-dark text-white" style="width: 200px">Register</button>
                    </a>
                </div>
            </div>
            <div class="col-8">
                <div class="card ms-5">
                    <div class="card-body">
                        <h3 class="text-center">Register</h3>
                        <form method="POST">
                        <div class="mb-3">
                                <label for="">Username</label>
                                <input type="username" name="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password"name="comfirm_password"  class="form-control">
                            </div>
                            <button type="submit" class="btn btn-dark mt-3 text-white float-end" name="register">Register</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php
   session_start();
   function checkStrongpasswords($password){
    $upperStatus = false;
    $lowerStatus = false;
    $numberStatus = false;
    $specialStatus = false;

    if (preg_match('/[A-Z]/',$password)){
       $upperStatus = true;
    }
     if (preg_match('/[a-z]/',$password)){
       $lowerStatus = true;
    }
     if (preg_match('/[0-9]/',$password)){
       $numberStatus = true;
    }
     if (preg_match('/[!@#$%^&*]/',$password)){
       $specialStatus = true;
    }
    if ($upperStatus && $lowerStatus && $specialStatus && $numberStatus ){
        return true;
    }else{
        return false;
    }
   }
   checkStrongpasswords("Pass7");
    if(isset($_POST['register'])){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $comfirmpassword = $_POST['comfirm_password'];

      if ( $name != '' && $email != '' && $password != '' && $comfirmpassword != ''){
        if (strlen($password) >= 6 && strlen($comfirmpassword) >= 6 ){
            if ( $password == $comfirmpassword){
              $status = checkStrongpasswords($password);
             
              if ($status){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = password_hash($password,PASSWORD_BCRYPT);
                echo '<script>alert("Register success")</script>';
              }else{
                echo '<script>alert("Your password is not strong Password!")</script>';
              }
                
            }else {
                echo '<script> alert("Password not same");</script>';
            }
            
        }else {
            echo '<script> alert("password must be greater than 6")</script>';
        }
      }else{
            echo '<script> alert("Need to fill")</script>';
      }
    }

   ?>
   
</body>
</html>