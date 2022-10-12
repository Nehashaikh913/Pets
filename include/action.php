<?php
date_default_timezone_set("Asia/Kolkata");
$userid = $_COOKIE['userid'];
include('../pets-admin/include/config.php');
// if($_POST['btn']=='getCartproduct'){
//     $stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=?");
//     $stmt->execute([$_POST['userid']]);
//     $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo $userCount=$stmt->rowCount();
       
// }

if($_POST['btn']=='addTocart'){
$add_cart_insert = $conn->prepare('INSERT INTO cart(pro_name, pro_category, pro_price, pro_img, pro_qty, sub_total, userid, status)VALUES(?,?,?,?,?,?,?,?)');
if($add_cart_insert->execute([$_POST['pro_name'], $_POST['pro_category'], $_POST['pro_price'], $_POST['pro_img'], $_POST['pro_qty'], $_POST['pro_price'], $_POST['userid'], $_POST['status']])){
    $msg = "inserted";
}   
    $arr_data = array('msg' => $msg);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arr_data);
}

if($_POST['btn']=='cartCount'){
    $stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=? AND status='cart'");
    $stmt->execute([$userid]);
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $userCount=$stmt->rowCount();
}
if($_POST['btn']=='wishCount'){
    $stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=? AND status='wishlist'");
    $stmt->execute([$userid]);
    $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $userCount=$stmt->rowCount();
}
if($_POST['btn']=='deleteProductcart'){
    $cart_id = $_POST['pro_cartid'];
    $delete_cart = $conn->prepare('DELETE FROM `cart` WHERE id=?');
    $delete_cart->execute([$cart_id]);
    echo "deleted";
}

if($_POST['btn']=='getCartpageproduct'){
    $data="";
    $check="";
    $total_ui="";
    $cartTotal=0;
    $k=0;
    $stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=?");
    $stmt->execute([$userid]);
    $proCount=$stmt->rowCount();
    if($proCount>0){
    while($cart_data = $stmt->fetch(PDO::FETCH_ASSOC)){
        $id = $cart_data['id'];
        $name = $cart_data['pro_name'];
        $image = $cart_data['pro_img'];
        $price = $cart_data['pro_price'];
        $qty = $cart_data['pro_qty'];
        $cartTotal = $cartTotal + ($cart_data["sub_total"] * $cart_data["pro_qty"]);
    $data.="    
    <div class='data__list__block mb-4'>
        <div class='data-list p-1 p-lg-2 d-flex align-items-center gap-4'>
            <div class='lhs'>
                <img src='$image' width='90'>
            </div>
            <div class='rhs w-100'>
                <div class='grid-template'>
                    <div class='one'><div class='title'>$name</div></div>
                    <div class='two'><div class='btn'><i class='fa-solid fa-trash-can'></i><span class='delete d-none d-lg-inline ms-3' onclick='deleteCartproduct($id)'>Delete</span></div></div>
                    <div class='three'><div class='price'>$$price</div></div>
                    <div class='four'><div class='btn'><i class='fa-regular fa-heart'></i><span class='text d-none d-lg-inline ms-3'>Move to whistlist</span></div></div>
                    <div class='five'><div class='btn'>Qty:
                        <select name='productQuantity' class='productQuantity$k' id='productQuantity' data-cartpro_id=$id onchange='changeQuantity(this)'>";
                        for($i=1; $i<=5; $i++){
                            if($i==$qty){
                                $check = 'selected';
                            }else{
                                $check = '';
                            }
                        $data.="<option value='$i' $check>$i</option>";
                        }
                        $data.="</select></div></div>
                </div>
            </div>
        </div>
    </div>";
    $k++;
    }
    $final_cartTotal = $cartTotal+30;
    $total_ui.="<div class='cart-totals'>
    <ul>
        <li>Subtotal<span>$cartTotal</span></li>
        <li>Shipping<span>$30.00</span></li>
        <li>Total <span>$final_cartTotal</span></li>
    </ul>
    <a href='checkout.html' class='default-btn'><span>Proceed to Checkout</span></a>
    </div>";

    }else{
        $data.="<p style='font-size:25px; color:red;'>Your cart is empty</p>";
    } 
    $arr_data = array('html_content' => $data, 'sideCarttotal' => $total_ui);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arr_data);
}
if($_POST['btn']=='updateProductcart'){
    $pro_qty = $_POST['pro_qty'];
    $cart_id = $_POST['pro_cartid'];
    $delete_cart = $conn->prepare('UPDATE `cart` SET pro_qty=? WHERE id=?');
    $delete_cart->execute([$pro_qty, $cart_id]);
    echo "updated";
}

if($_POST['btn']=='addTowishlist'){
    $add_wishlist_insert = $conn->prepare('INSERT INTO wishlist(pro_name, pro_category, pro_price, pro_img, pro_qty, sub_total, userid)VALUES(?,?,?,?,?,?,?)');
    $add_wishlist_insert->execute([$_POST['pro_name'], $_POST['pro_category'], $_POST['pro_price'], $_POST['pro_img'], $_POST['pro_qty'], $_POST['pro_price'], $_POST['userid']]);   

        $stmt = $conn->prepare("SELECT * FROM `wishlist` WHERE userid=?");
        $stmt->execute([$_POST['userid']]);
        $user_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $userCount=$stmt->rowCount();

        // $data = cartProduct($conn);
        // $arr_data = array('cart_html' => $data,'cart_count' => $userCount, 'total_price' => $userCount);
        // header('Content-Type: application/json; charset=utf-8');
        // echo json_encode($arr_data);
    
    }

if($_POST['btn']=='checkout_form'){
    $add_checkout_insert = $conn->prepare('INSERT INTO cart(pro_name, pro_price, pro_img, pro_qty, userid)VALUES(?,?,?,?,?)');
    $add_checkout_insert->execute([$_POST['pro_name'], $_POST['pro_price'], $_POST['pro_img'], $_POST['pro_qty'], $_POST['userid']]);
    echo "inserted";
}
if($_POST['btn']=='checkout_details'){
   
    $order_id = date('YmdHis');

    if(!empty($_POST['email'])){
        $stmt = $conn->prepare("SELECT * FROM `customer_details` WHERE email=?");
        $stmt->execute([$_POST['email']]);
        $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        $userCount=$stmt->rowCount();
        if($userCount==0){
            
            $add_customer_insert = $conn->prepare('INSERT INTO customer_details(userid, name, email, phone)VALUES(?,?,?,?)');
            $add_customer_insert->execute([$_POST['userid'], $_POST['full_name'], $_POST['email'], $_POST['phone']]);
        }
        else{
            $userid = $user_data['userid'];
        }

        $add_address_insert = $conn->prepare('INSERT INTO address(address, city, state, pincode, userid)VALUES(?,?,?,?,?)');
        $add_address_insert->execute([$_POST['address'], $_POST['city'], $_POST['state'], $_POST['post_code'], $userid]);
        
        $stmt_cart = $conn->prepare("SELECT * FROM `cart` WHERE userid=?");
        $stmt_cart->execute([$userid]);
        while($user_cart_data = $stmt_cart->fetch(PDO::FETCH_ASSOC)){
            $add_order_insert = $conn->prepare('INSERT INTO order_product(pro_name, pro_category, pro_price, pro_img, pro_qty, sub_total, userid, order_id)VALUES(?,?,?,?,?,?,?,?)');
            $add_order_insert->execute([$user_cart_data['pro_name'], $user_cart_data['pro_category'], $user_cart_data['pro_price'], $user_cart_data['pro_img'], $user_cart_data['pro_qty'], $user_cart_data['sub_total'], $user_cart_data['userid'], $order_id]);
            }

        $stmt_total_price = $conn->prepare("SELECT SUM(sub_total) AS total_price FROM `order_product` WHERE userid=?");
        $stmt_total_price->execute([$userid]);
        $user_data = $stmt_total_price->fetch(PDO::FETCH_ASSOC);
        $sub_total = $user_data['total_price'];
        $shipping=20;
        $discount=40;
        $order_date = date('Y-m-d H:i:s');
        $total = ($sub_total-$discount)+$shipping;
        $add_order_detail_insert = $conn->prepare('INSERT INTO order_details(invoice_id, userid, disc_price, shipping_charges, sub_total, total, name, email, phone, address, city, pincode, state, payment_mode, order_date)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $add_order_detail_insert->execute([$order_id, $userid, $discount, $shipping, $sub_total, $total, $_POST['full_name'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['city'], $_POST['post_code'], $_POST['state'], $_POST['payment-method'], $order_date]);
        echo "done";
        
    } 
}

if($_POST['btn']=='getAllupdatedcartProduct'){
    // $stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=?");
    // $stmt->execute([$userid]);
    // $userCount=$stmt->rowCount(); 
    echo $data = cartProduct($conn);
    //echo $cart_data =$userCount.",".$data;

}
if($_POST['btn']=='addQuantity'){

        $sub_total=0;
        $cartTotal=0;
        $shipping_charges=20;
        $cart_id = $_POST['cart_id'];
        $cart_userid = $_POST['userid'];
        $qty_stmt = $conn->prepare("SELECT * FROM `cart` WHERE id=?");
        $qty_stmt->execute([$cart_id]);
        while ($row = $qty_stmt->fetch(PDO::FETCH_ASSOC)){
         $qty=$row['pro_qty'];
         $price = $row['pro_price'];
         
         $total_qty=$qty+1;   
         
         $sub_total = $sub_total+($price * $total_qty);   
         $qty_cart = $conn->prepare('UPDATE `cart` SET `pro_qty`=?,`sub_total`=? WHERE id=?');
         $qty_cart->execute([$total_qty, $sub_total, $cart_id]);   
        
         $get_allcart_stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=?");
         $get_allcart_stmt->execute([$cart_userid]);
         while ($row = $get_allcart_stmt->fetch(PDO::FETCH_ASSOC)){
         $sub_qty=$row['pro_qty']; 
         $sub_total=$row['sub_total'];
         $cartTotal = $cartTotal + ($row["pro_price"] * $row["pro_qty"]);
         $cartTotal=$cartTotal+$shipping_charges;               
         }

         $arr_data = array('qty' => $sub_qty,'sub_total' => $sub_total, 'total_price' => $cartTotal);
         header('Content-Type: application/json; charset=utf-8');
         echo json_encode($arr_data);

    }
}
if($_POST['btn']=='removeQuantity'){

    $sub_total=0;
    $cartTotal=0;
    $shipping_charges=20;
    $cart_id = $_POST['cart_id'];
    $cart_userid = $_POST['userid'];
    $qty_stmt = $conn->prepare("SELECT * FROM `cart` WHERE id=?");
    $qty_stmt->execute([$cart_id]);
    while ($row = $qty_stmt->fetch(PDO::FETCH_ASSOC)){
     $qty=$row['pro_qty'];
     $price = $row['pro_price'];
     $total_qty=$qty-1;   
     $sub_total = $sub_total+($price * $total_qty);   
     $qty_cart = $conn->prepare('UPDATE `cart` SET `pro_qty`=?,`sub_total`=? WHERE id=?');
     $qty_cart->execute([$total_qty, $sub_total, $cart_id]);   
    
     $get_allcart_stmt = $conn->prepare("SELECT * FROM `cart` WHERE userid=?");
     $get_allcart_stmt->execute([$cart_userid]);
     while ($row = $get_allcart_stmt->fetch(PDO::FETCH_ASSOC)){
     $sub_qty=$row['pro_qty']; 
     $sub_total=$row['sub_total'];
     $cartTotal = $cartTotal + ($row["pro_price"] * $row["pro_qty"]);
     $cartTotal=$cartTotal+$shipping_charges;               
     }

     $arr_data = array('qty' => $sub_qty,'sub_total' => $sub_total, 'total_price' => $cartTotal);
     header('Content-Type: application/json; charset=utf-8');
     echo json_encode($arr_data);

    }
}
?>