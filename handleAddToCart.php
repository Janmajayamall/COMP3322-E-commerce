<?php
    session_start();
    if (!($_SESSION["shoppingCart"])){
        $_SESSION["shoppingCart"] = array();
    }
    if (isset($_GET["itemID"])){
        $flag = 1;
        foreach($_SESSION["shoppingCart"] as &$item){
            if ($item['itemID']==$_GET["itemID"]){
                $flag = 0;
                // $currentNumber = $item["itemNumber"];
                $item['itemNumber'] = $_GET["itemNumber"];
            }
        }
        if ($flag){
            $_SESSION["shoppingCart"][] = array('itemID'=>$_GET["itemID"], 'itemNumber'=>$_GET["itemNumber"]);
        }
    }

    print json_encode($_SESSION["shoppingCart"]);
?>