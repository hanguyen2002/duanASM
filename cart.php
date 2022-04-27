<?php
    session_start();
    require_once "connect.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM product WHERE id = $id";
    $result=mysqli_query($conn,$sql);

    $product_cart = array();
    foreach ($result as $value){
        $product_cart[$value["id"]] = $value;
    }

    if (isset($_POST["add-to-cart"])) {
        // xet so luong de san pham ko be hon 1
		if (!isset($_SESSION["cart"]) || $_SESSION["cart"] == null){
            $product_cart[$id]["so_luong"] = 1;
            $_SESSION["cart"][$id] = $product_cart[$id];
        }
        else{
            if(array_key_exists($id, $_SESSION["cart"])){
                $_SESSION["cart"][$id]["so_luong"] +=1;
            }
            else{
                $product_cart[$id]["so_luong"] = 1;
                $_SESSION["cart"][$id] = $product_cart[$id];
            }
        }
            header("Location:pay.php");
	}
?>