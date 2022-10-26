<?php
    

    if(isset($_POST['order'])){

        $user_id=$_POST['pdrus'];
        $user_cli=$_POST['cxtip'];
        $method=$_POST['cxtcre'];
        $placed_on = date('d-M-Y');
        $tipc = $_POST['cxcom'];

        $cart_total = 0;
        $cart_products[] = '';

        $cart_query = $connect->prepare("SELECT cart.idv, usuarios.id, usuarios.nombre, usuarios.usuario, productos.idprd, productos.nomprd, productos.numprd, productos.detprd, productos.preprd, productos.foto,productos.stckprd, cart.name, cart.price, cart.quantity FROM cart INNER JOIN usuarios ON cart.user_id = usuarios.id INNER JOIN productos ON cart.idprd = productos.idprd WHERE  user_id = ?");
        $cart_query->execute([$user_id]);


        if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['preprd'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };


   $total_products = implode(', ', $cart_products);

   $order_query = $connect->prepare("SELECT * FROM `orders` WHERE method = ?  AND total_products = ? AND total_price = ? AND tipc = ?");
   $order_query->execute([$method, $total_products, $cart_total, $tipc]);


   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'order placed already!';
   }else{

      $insert_order = $connect->prepare("INSERT INTO `orders`(user_id, user_cli, method, total_products, total_price, placed_on,payment_status, tipc) VALUES(?,?,?,?,?,?, 'Aceptado', ?)");
      $insert_order->execute([$user_id, $user_cli, $method,$total_products, $cart_total, $placed_on, $tipc]);

      
      $delete_cart = $connect->prepare("DELETE FROM `cart` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      //$message[] = 'order placed successfully!';
      echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
   }


    }

?>