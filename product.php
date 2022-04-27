
<?php
    require_once "connect.php";
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing:  border-box;
        }
        .container {
            width:90%;
            margin:auto;
            background:lightblue;
            display:flex;
            flex-wrap:wrap;
        }
        .product {
            display:flex;
            flex-wrap:wrap;
            width:100%;
        }
        .image img {
            width:75%;
        }
        .cart {
            width:20%;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="product">
        <p><a href ="home.php">Home</a></p>
        <?php
            foreach($result as $value) {?>
                <div class="cart">
                    <div class="image">
                      <img src="<?php echo $value["img"];?>">
                    </div>
                    <div class="name">
                      <a href="detail.php?id=<?php echo $value["id"]; ?>"> <p> <?php echo $value["name"]; ?> </p> </a>
                    </div>
                    <div class="price">
                      <a href="detail.php?id=<?php echo $value["id"]; ?>"> <p> <?php echo $value["price"];?> </p> </a>
                  </div>
                </div>
              <?php
            }
          ?>
    </div>
  </div>
</body>
</html>