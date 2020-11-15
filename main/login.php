<?php

    session_start();

    $servername = "localhost";
    $username = "ashish";
    $userpassword = "Ashu@321";
    $userdb = "phpapp";

    $conn = mysqli_connect($servername,$username,$userpassword,$userdb);

    if(!$conn){
        die("Connection failed:" .mysqli_connect_error());
    }else{
        echo "Successfully Connected";
    }
    ?>

<?php 
    if(isset($_POST['submit'])){
        $fullname = mysqli_real_escape_string($conn, trim($_POST['fullName']));
        $email = mysqli_real_escape_string($conn, trim( $_POST['email']));
        $userName = mysqli_real_escape_string($conn, trim($_POST['userName']));
        $password = mysqli_real_escape_string($conn, trim($_POST['password']));

        $fullname_valid = $email_valid = $password_valid = $userName_valid = false;

        $_SESSION["fullname"] = $fullname;

        if(!empty($fullname)){
            if(strlen($fullname)>6 && strlen($fullname) <= 25){
                if(!preg_match('/[^a-zA-Z\s]/', $fullname))
                {
                    $fullname_valid = true;
                }
                else
                {
?>                 
                    <div class="alert alert-danger" role="alert">
                        <?php echo "Fullname contain only alphabet"; ?>
                    </div>
<?php
               }
            } 
            else 
            {
?>                 
                    <div class="alert alert-danger" role="alert">
                        <?php echo "Fullname must be between 2 and 30 characters length"; ?>
                    </div>
<?php 
            }
        } 
        else 
        {
?>                 
                    <div class="alert alert-danger" role="alert">
                        <?php echo "Fullname cannot be blank"; ?>
                    </div>
<?php
        }
        if(!empty($email)){
            $email_valid = true ;
        }
        if(!empty($userName)){
            $email_valid = true ;
        }
        if(!empty($password)){
            $email_valid = true ;
        }

        if($fullname_valid && $email_valid && $password_valid && $userName_valid){
            $query = "INSERT INTO users(fullName,email,userName,password) VALUES('$fullname','$email','$userName','$password')";
            $fire = mysqli_query($conn,$query) or die("cannot insert data into database" .mysqli_error($conn));
            if($fire)
            {
                header("Location:user.php");
                echo "Registration is Successful";
            }
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
            crossorigin="anonymous">

    <link rel="stylesheet" href="..\mainstyle.css?v=<?php echo time(); ?>">

    <script src="https://kit.fontawesome.com/f4ab80ad7c.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
        <div id="topheader" class = "p-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 text-left">
                        <a href="tel:9113292443"><i class="fas fa-phone-square fa-1x"></i>+(91) 9113292443</a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="mailto:ashishsharma571994@gmail.com">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                            ashishsharma571994@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Header -->
        <div id="bottomheader">
          <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-dark" style ="background-color:#485460">
                <a class="navbar-brand" href="#"><i class="fab fa-angrycreative fa-3x"></i></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">Web Designing</a>
                                <a class="dropdown-item" href="">Web Development</a>
                                <a class="dropdown-item" href="">SEO Services</a>
                                <a class="dropdown-item" href="">Software Development</a>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="">Game Designing</a>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-right" href="">About Us</a>
                        </li>
                    </ul>
                   
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav text-right">
                        <li class="nav-item">
                            <a class="nav-link text-right" href="main\login.php">Employee SignIn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-right" href="">Customer SignIn</a>
                        </li>
                    </ul>
                </div>
            </nav>
          </div>
        </div>
    </header>


<div class="container-fluid login">
    <div class = "row">
        <div class = "col-md-6 login-box">
            <form name="signup" id="signup" action="<?php $_SERVER['PHP_SELF'] ?>" method = "POST">
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" placeholder="Enter Full Name" name = "fullName" id= "fullName" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Emails" name = "email" id= "email" required>
                </div>
                <div class="form-group">
                    <label for="userName">User Name</label>
                    <input type="text" class="form-control" placeholder="Enter User Name" name = "userName" id= "userName" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name = "password" id= "password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" id = "submit" class="btn btn-primary">Sign Up</button><br>
                    <small>Register Yourself here.</small>    
                </div>
            </form>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>
</body>
</html>