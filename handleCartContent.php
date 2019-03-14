<?php
    session_start();
    if (!($_SESSION["shoppingCart"])){
        $_SESSION["shoppingCart"] = array();
    }

    //Connect to database
    $conn=mysqli_connect('sophia.cs.hku.hk', 'jmall', 'EzTUTpDS') or die('Error! '. mysqli_error($conn));
    //Select database
    mysqli_select_db($conn, 'jmall') or die('Error! '. mysqli_error($conn));
    //Construct your SQL query here 

    $final_cart_content = array();
    foreach($_SESSION["shoppingCart"] as &$item){
        $query = "SELECT * FROM `catalog` WHERE itemID = ".$item['itemID'];
        $result = mysqli_query($conn, $query) or die('Error! '. mysql_error($conn));
        while($row = mysqli_fetch_array($result)) {
            $final_cart_content[] = array('itemID'=>$row['itemID'],'itemName'=> $row['itemName'],'itemDescription' => $row['itemDescription'] ,'itemPrice'=> $row['itemPrice'],'itemImage'=>$row['itemImage'],'itemCategory'=>$row['itemCategory'],'itemQuantity'=>$item['itemNumber']);
        }
    }
    print json_encode($final_cart_content);
?>