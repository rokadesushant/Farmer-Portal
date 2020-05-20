<?php
session_start();
include_once("database.php");
include_once("inc/config.inc.php");
setlocale(LC_MONETARY,"en_US");
# add products in cart 
//echo($_POST["productid"]);
if(isset($_POST["productid"])) {
	foreach($_POST as $key => $value){
		$product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
	}	
	$statement = $link->prepare("SELECT productname, price FROM product WHERE productid=? LIMIT 1");
	$statement->bind_param('s', $product['productid']);
	$statement->execute();
	$statement->bind_result($productname, $price);
	while($statement->fetch()){ 
		$product["productname"] = $productname;
		$product["price"] = $price;		
		if(isset($_SESSION["products"])){ 
			if(isset($_SESSION["products"][$product['productid']])) {				
				$_SESSION["products"][$product['productid']]["product_qty"] = $_SESSION["products"][$product['productid']]["product_qty"] + $_POST["product_qty"];				
			} else {
				$_SESSION["products"][$product['productid']] = $product;
			}			
		} else {
			$_SESSION["products"][$product['productid']] = $product;
		}	
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Remove products from cart
if(isset($_GET["remove_code"]) && isset($_SESSION["products"])) {
	$productid  = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING);
	if(isset($_SESSION["products"][$productid]))	{
		unset($_SESSION["products"][$productid]);
	}	
 	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}
# Update cart product quantity
if(isset($_GET["update_quantity"]) && isset($_SESSION["products"])) {	
	if(isset($_GET["quantity"]) && $_GET["quantity"]>0) {		
		$_SESSION["products"][$_GET["update_quantity"]]["product_qty"] = $_GET["quantity"];	
	}
	$total_product = count($_SESSION["products"]);
	die(json_encode(array('products'=>$total_product)));
}	