<?php
    include('connect.php');
    session_start();
    error_reporting(0);
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
           <h2>Login</2>
        
        </div>
        <form method = "post" action = "login.php">
            <div class = "input-group">
                <label>Username</label>
                <input type = "text" name = "name" value="<?php echo $email; ?>">
            </div>
            <div class = "input-group">
                <label>Password</label>
                <input type = "password" name = "pass" value="<?php echo $_POST['pass']; ?>"
            </div>
            <div class = "input-group">
                <button type = "submit" name = "login" class="btn">Login</button>
            </div>
            <p>
                Not yet a member ? <a href = "register.php">Sign up</a>
            </p>
            <a href = "home.php">Home</a>
        </form>  

        <?php
             if(isset($_POST['login'])){
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $sql = "SELECT * FROM users WHERE name='$name' AND pass='$pass'";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows > 0){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['name'] = $row['name'];
                    header ("Location: home.php");
                }
                else{
                    echo "<script>alert('Name or Pass is wrong.')</script>";
                }
            }
        ?>
</body>
</html>