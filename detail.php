<?php
    require_once "connect.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM product WHERE id = $id";
    $result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .container{
            width:90%;
            margin:auto;
            display:flex;
            background: coral;
            justify-content:center;
        }
        .show{
            display:flex;
            justify-content:center;
        }
        .cart{
            flex:1;
        }
        .image img{
            flex:1;
            width:50%;
        }
        
       

    </style>
</head>
<body>
    <div class="container">
        <?php
            foreach($result as $value){?>
                <div class ="show">
                    <div class="cart">
                        <div class ="name">
                            <p><?php echo $value["name"];?></p>
                            <p><?php echo $value["price"];?></p>
                        </div>
                        <div class ="button">
                            <form action="cart.php?id=<?php echo $value["id"]; ?>" method="POST">
                            <button type="submit" name="add-to-cart">
                                ADD TO CART
                            </button>
                            </form>
                        </div>
                    </div>
                        <div class="image">
                            <img src="<?php echo $value["img"];?>">
                        </div>
                </div>
            <?php
            }
        ?> 
    </div>    
</body>
</html>