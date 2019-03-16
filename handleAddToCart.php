<?php
    session_start();
 
    function searchForItem($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['itemID'] === $id) {
                return $key;
            }
        }
        return null;
     }
    
    if (!($_SESSION["shoppingCart"])){
        $_SESSION["shoppingCart"] = array();
    }
    if (isset($_GET["itemID"])){
        $flag = 1;
        foreach($_SESSION["shoppingCart"] as &$item){
            if ($item['itemID']==$_GET["itemID"]){
                $flag = 0;
                $currentNumber = (int)$item["itemNumber"];
                $changeBy = (int)$_GET["updateNumber"];
                $item['itemNumber'] = $currentNumber + $changeBy;
            }
            //checking if the $itemNumber is 0
            if ($item['itemNumber'] == '0'){
                $removeIt = searchForItem($item['itemID'], $_SESSION['shoppingCart']);
                unset($_SESSION["shoppingCart"][$removeIt]);
            }  
        }
        if ($flag){
            $_SESSION["shoppingCart"][] = array('itemID'=>$_GET["itemID"], 'itemNumber'=>$_GET["updateNumber"]);
        }
    }

    $totalItems = 0;
    foreach($_SESSION["shoppingCart"] as &$item){
        $totalItems = $totalItems + (int)$item["itemNumber"];
    }

    print $totalItems;
?>