<?php
    session_start();
    
    if (!($_SESSION["shoppingCart"])){
        $_SESSION["shoppingCart"] = array();
    }
    if (isset($_GET["itemID"])){
        $flag = 1;
        $count = 0;
        foreach($_SESSION["shoppingCart"] as &$item){
            if ($item['itemID']==$_GET["itemID"]){
                $flag = 0;
                $currentNumber = (int)$item["itemNumber"];
                $changeBy = (int)$_GET["updateNumber"];
                $item['itemNumber'] = $currentNumber + $changeBy;
                //checking if the $itemNumber is 0
                if ($item['itemNumber'] == '0'){
                    echo 'qiqiq';
                    echo $count;
                    array_splice($_SESSION["shoppingCart"], $count, $count+1);
                }
            }
            $count = $count + 1;
        }
        if ($flag){
            $_SESSION["shoppingCart"][] = array('itemID'=>$_GET["itemID"], 'itemNumber'=>$_GET["updateNumber"]);
        }
    }
    print json_encode($_SESSION["shoppingCart"]);
?>