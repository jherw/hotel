<?php
/*
* Agrega el producto a la variable de sesion de productos.
*/
session_start();
if(!empty($_POST)){
	if(isset($_POST["idprd"])  && isset($_POST["canti"]) && isset($_POST["stckprd"]) ){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["carts"])){
			$_SESSION["carts"]=array( array("idprd"=>$_POST["idprd"], "canti"=>$_POST["canti"],"stckprd"=>$_POST["stckprd"]));
		}else{
			// apartie del segundo producto:
			$carts = $_SESSION["carts"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($carts as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["idprd"]==$_POST["idprd"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
				array_push($carts, array("idprd"=>$_POST["idprd"],"canti"=> $_POST["canti"],"stckprd"=> $_POST["stckprd"]));
				$_SESSION["carts"] = $carts;
			}
		}
		print "<script>window.location='nuevo';</script>";
	}
}

?>

