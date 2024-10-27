<?php
    // include('header-after.php');
    include('config/include.php');
    include('user-logincheck.php');

    $user_id = $_SESSION['user_id'];

    $res=mysqli_query($conn,"SELECT * FROM user where id='$user_id'") or die('query failed');
    if(mysqli_num_rows($res)>0){
        while($rows=mysqli_fetch_assoc($res)){
            $fullname=$rows['fullname'];
            $email=$rows['email'];
            // $email='tisha@gmail.com';
            $phone=$rows['phone'];
            $address=$rows['address'];
        }
    }

    $grand_total = 0;
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    if(mysqli_num_rows($select_cart) > 0){
        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
        $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
        $grand_total =($grand_total+ $total_price)/100;
        }
        $grand_total=$grand_total*100;
        // $grand_total*=10;
    }

    $status="Ordered";
    // $order_date=date("Y_m_d h:i:sa");
    $order_date=date("Y_m_d");
    $cart_total = 0;
    $cart_products[] = '';

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    $key_title = array();
    $value_quantity = array();

    
    if(mysqli_num_rows($cart_query) > 0){
        while($cart_item = mysqli_fetch_assoc($cart_query)){
            // $cart_products[] = $cart_item['title'].' ('.$cart_item['quantity'].') ';
            $cart_products[] = $cart_item['title'].'- ('.$cart_item['quantity'].'),'.$cart_item['size'].';';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
            $key_title[] = $cart_item['title'];
            $value_quantity[] = $cart_item['quantity'];
        }
    }
    $dict = array_combine($key_title, $value_quantity);
    $total_products = implode(' ',$cart_products);

    $order_query = mysqli_query($conn, "SELECT * FROM `cart_orders` WHERE name = '$fullname' AND phone = '$phone' AND email ='$email' AND address = '$address' AND status = '$status' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

    if($cart_total == 0){
        $message[] = 'your cart is empty!';
    }elseif(mysqli_num_rows($order_query) > 0){
        echo "<script>
                alert('order placed already!');      
      </script>";
    }else{
        mysqli_query($conn, "INSERT INTO `cart_orders`(user_id, name, phone, email, address, total_products, total_price, order_date, payment_mode, status) VALUES('$user_id', '$fullname', '$phone', '$email', '$address', '$total_products', '$cart_total' ,'$order_date', 'Khalti', '$status')") or die('query failed');

        foreach($dict as $key => $value){
          $res=mysqli_query($conn, "SELECT * FROM products WHERE title='$key'") or die('query failed');
          while($rows=mysqli_fetch_assoc($res)){
            $stock=$rows['stock'];
          }
          mysqli_query($conn, "UPDATE products set  stock=(stock-'$value') where title='$key'");
        }

        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
        echo "<script>
          
                alert('Order placed successfully');
               
      </script>";
    }
?>

<?php
    $data = array(
        "return_url" => "http://localhost/Khukuri-wears/addtocart.php",
        "website_url" => "http://localhost/Khukuri-wears/index-after.php",
        "amount" => $grand_total,  // Use the value of $grand_total here
        "purchase_order_id" => "Order01",
        "purchase_order_name" => "test",
        "customer_info" => array(
            "name" => $fullname,
            "email" => $email,
            "phone" => $phone
        )
    );
    
    $post_data = json_encode($data); 


    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post_data,
    CURLOPT_HTTPHEADER => array(
        'Authorization: key abc779f2fd23486297aa5279719bb5b2',
        'Content-Type: application/json',
    ),
    ));

    $response = curl_exec($curl);

    // $payment_url = $response_array['payment_url'];
    // echo $payment_url;

    if ($response === false) {
        echo curl_error($curl);
    } else {
        $response_array = json_decode($response, true);
        if (!empty($response_array['payment_url'])) {
            // Perform the redirection 
            header("Location: " . $response_array['payment_url']);
            exit;
        } else {
            // Handle case where payment_url is empty
            echo "Payment initiation failed or payment URL is empty.";
        }
    }
    
    
    echo $response;

    curl_close($curl);
    
