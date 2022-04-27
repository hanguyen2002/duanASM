<?php
    session_start();
    require_once "connect.php";
    if (isset($_POST["update"])) {
		if (isset($_SESSION["cart"])) {
		    foreach ($_SESSION["cart"] as $value) {
                if ($_POST["so_luong".$value["id"]] <= 0) {
                    
                    unset($_SESSION["cart"]["so_luong".$value["id"]]);
                }
                else{
                    $_SESSION["cart"][$value["id"]]["so_luong"] = $_POST["so_luong".$value["id"]];
                }
            }
		}
	}
    if(isset($_POST["order"])){
        if(empty($_POST["customer"]) || empty($_POST["address"]) || empty($_POST["phone"]) || empty($_POST["total"])){
        }else{
            $cart = !empty($_SESSION["cart"])?$_SESSION["cart"]:[];
            $customer = $_POST["customer"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $total = $_POST["total"];
            $sql = "INSERT INTO orderr (name, phone, address, amount, total) VALUES ('$customer', '$phone', '$address','3','$total')";
            $result_order = mysqli_query($conn, $sql);
            $order = "SELECT MAX(id) as 'id' FROM orderr";
            $order_result = mysqli_query($conn, $order);

            while ($id_don_hang = mysqli_fetch_array($order_result)) {
                $id_order = $id_don_hang["id"];
            }
            foreach ($cart as $value) {
                $id = $value["id"];
                $sl = $value["so_luong"];
                $order_detail = "INSERT INTO order_detail (idProduct, amount, idOrder) VALUES ('$id', '$sl', '$id_order')";
                echo "Đặt hàng thành công";
                $reult_detail = mysqli_query($conn,$order_detail);
            }
            unset($_SESSION["cart"]);
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div>
        <form action="pay.php" method="post">
        <table class = "a">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Đơn Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $total=0;
                    if (isset($_SESSION["cart"])){
                        foreach($_SESSION["cart"] as $value){
                            // vong lap tinh tong tien
                            $tong = 0;
                            $tong = $value["price"]*$value["so_luong"];
                            $total += $tong;
                            ?>
                                <tr>
                                    <td><?php echo $value["id"]; ?></td>
                                    <td><?php echo $value["name"]; ?></td>
                                    <td><?php echo $value["price"]; ?></td>
                                    <td><input type="number" min="1" name="so_luong<?php echo $value["id"]; ?>" value="<?php echo $value["so_luong"]; ?>"></td>
                                    <td><?php echo $tong; ?></td>
                                    <td><?php echo ($value["so_luong"]); ?></td>
                                    <td><a href="delete.php?id=<?php echo $value["id"]; ?>">DELETE</a> </td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
        <p>Gia tri don hang: <?php echo number_format($total);?> </p>
        <button type="submit" name="update">UPDATE CART</button>
        <div class="form-group">
            <input type="text" name="customer" placeholder="Nhap ho ten">  
        </div>
        <div class="form-group">
            <input type="text" name="address" placeholder="nhap dia chi">  
        </div>
        <div class="form-group">
            <input type="text" name="phone" placeholder="Nhap so dien thoai">
            <input type="hidden" name="total" value="<?php echo $total; ?>">  
        </div>
        <div class="form-group">
            <input type="submit" name="order" value="ORDER">  
        </div>
        </form>
    </div>


</body>
</html>