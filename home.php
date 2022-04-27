<?php
    require_once "connect.php";
    function connect(){
      $host = "localhost" ; 
      $dbname = "123" ; 
      $dbusername = "root" ; 
      $dbpass = "mysql" ; 
      return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername,$dbpass) ; 
  }
  
  function select_all($sql){
      $connect = connect();
      $stml = $connect->prepare($sql);
      $stml->execute();
      return $select_all = $stml->fetchAll();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style> 
</head>
<body>

  <div class="jumbotron">
  <div class="container text-center">
    <h2>Online Store</h2>      
    <p>Apple</p>
  </div>
  </div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="active"><a href="product.php">Order Product</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
        <form action="" method="post">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
        </form>
      </ul>
    </div>
  </div>
  </nav>

  <div class="container">   
  <?php
        if(ISSET($_POST['submit'])){
          $keyword = $_POST['search'];
        ?>
          <div>
              <h2>Kết quả</h2>
              <?php
                  // $query = mysqli_query($conn, "SELECT * FROM user WHERE name LIKE '%$keyword%' ") or die(mysqli_error());
                  $sql = "select * from product where name like '%$keyword%'";
                  $name = select_all($sql) ;
                  foreach($name as $row){
                      echo $row['name']."<br>";
                  }
              ?>
          </div>
        <?php
      }
    ?> 
  <div class="row">
    <!--Chia tỷ lệ cột -->
    <div class="col-sm-4 text-center"> 
      <div class="panel panel-primary">
        <div class="panel-heading">iPhone 13 Pro Max 256GB</div>
        <div class="panel-body"><img src="iphone_13-_pro-5_4_1.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">32500000</div>
      </div>
    </div>
    <div class="col-sm-4 text-center"> 
      <div class="panel panel-primary">
        <div class="panel-heading">iPhone SE 2022</div>
        <div class="panel-body"><img src="iphone-se-red-select-20220322.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">12490000</div>
      </div>
    </div>

    <div class="col-sm-4 text-center"> 
      <div class="panel panel-primary">
        <div class="panel-heading">iPhone 11 128GB</div>
        <div class="panel-body"><img src="iphone-11_6_.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">13700000</div>
      </div>
    </div>
  </div>
  </div><br><br>
 
  <!--Het-->

  <!--Cot duoi-->
  <div class="container">    
  <div class="row">
    <!--Chia tỷ lệ cột -->
    <div class="col-sm-4 text-center"> 
      <div class="panel panel-primary">
        <div class="panel-heading">iPhone 12 Pro Max 256GB</div>
        <div class="panel-body"><img src="iphone-12-pro-max_3__5.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">23190000</div>
      </div>
    </div>

    <div class="col-sm-4 text-center"> 
      <div class="panel panel-primary">
        <div class="panel-heading">iPhone XR 128GB </div>
        <div class="panel-body"><img src="apple-iphone-xr-64-gb-chinh-hang-vn_1__1.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">27690000</div>
      </div>
    </div>

    <div class="col-sm-4 text-center"> 
      <div class="panel panel-primary">
        <div class="panel-heading">Apple iPhone 8 64GB </div>
        <div class="panel-body"><img src="iphone_8_64gb.png" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">10020000</div>
      </div>
    </div>
  </div>
  </div><br><br>
  <!--Het-->



  <footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
  </footer>

</body>
</html>

