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
                        <form method="POST">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                                </div>
                                <input type="checkbox" name="" id="">
                                <label for="" >Remember me</label>

                                <span class="text " style="margin-left: 380px;"><a href="Register.php">Forgot Password?</a></span>
                           
                            <button type="submit" class="btn btn-danger mt-5 text-white float-end" name="Login">Login</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
  <?php
   session_start();
    if (isset($_POST['Login'])){
        $useremail = $_POST['email'];
        $userpassword = $_POST['password'];


        if ($useremail == $_SESSION['email'] &&  password_verify($userpassword,$_SESSION['password']))
        {
            echo '<script>alert("Password Verify!")</script>';

        }else {
            echo '<script>alert("Password Failed!")</script>';
        }
    }

  ?>
    
</body>
</html>