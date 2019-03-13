<?php
    //Connect to database
    $conn=mysqli_connect('sophia.cs.hku.hk', 'jmall', 'EzTUTpDS') or die('Error! '. mysqli_error($conn));
    //Select database
    mysqli_select_db($conn, 'jmall') or die('Error! '. mysqli_error($conn));
    //Construct your SQL query here 
    $pagination = (int)$_GET["page"];
    //checking if the data is enough for current page requested
    $checkQuery = "SELECT COUNT(*) FROM `catalog` WHERE itemCategory = 'Books'";
    $count = mysqli_query($conn, $checkQuery) or die('Error! '. mysql_error($conn));
    while($row = mysqli_fetch_array($count)) {
      $count = ceil($row[0]/3);
      if ($count >= $pagination){
        $pagination = ($pagination-1)*3;
        $query = 'select * from catalog WHERE itemCategory = \''.$_GET["category"].'\' order by itemName ASC limit '.$pagination.', 3';
        $result = mysqli_query($conn, $query) or die('Error! '. mysql_error($conn));
        $item_array=array();
      
        while($row = mysqli_fetch_array($result)) {
          $item_array[] = array('itemID'=>$row['itemID'],'itemName'=> $row['itemName'],'itemDescription' => $row['itemDescription'] ,'itemPrice'=> $row['itemPrice'],'itemImage'=>$row['itemImage'],'itemCategory'=>$row['itemCategory']);    }
        
        $final_output[] = array('item_array'=>$item_array, 'page_count'=>$count);
        print json_encode($final_output);    
      }
    }

  ?>
