<?php
    include('connect.php');
    session_start();
    // if(isset($_SESSION['name'])){
    //     header("Location:login.php");
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel= "stylesheet" type="text/css" href="style.css"
</head>
<body>
       <div class="header">
           <h2>Register</2>
        </div>
        <form method = "post" action = "register.php">
            <div class = "input-group">
                <label>Name</label>
                <input type = "text" name = "name" require>
            </div>
            <div class = "input-group">
                <label>Email</label>
                <input type = "text" name = "email" require>
            </div>
            <div class = "input-group">
                <label>Pass</label>
                <input type = "password" name = "pass" require>
            </div>
            <div class = "input-group">
                <button type = "submid" name = "register" class = "btn">Register</button>
            </div>
            <p>
                Already a member ? <a href="login.php">Sign in</a>
            </p>
        </form>

        <?php
            if(isset($_POST['register'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                if(!empty($name) && !empty($email) && !empty($pass)){
                    $sql = "INSERT INTO users (name, email, pass) VALUES ('$name','$email','$pass')";
                    if($conn->query($sql)==TRUE){
                        echo "Luu du lieu thang cong";
                        header ("Location: login.php");
                    }else{
                        echo "Loi {sql}".mysqli_error($conn);
                    }

                }else{
                    echo "<script> alert('Chua nhap du thong tin!!!')</script>";
                }
            }
        ?>
</body>
</html>