<?php
    //Connect to database
    $conn=mysqli_connect('sophia.cs.hku.hk', 'jmall', 'EzTUTpDS') or die('Error! '. mysqli_error($conn));
    //Select database
    mysqli_select_db($conn, 'jmall') or die('Error! '. mysqli_error($conn));
    //Construct your SQL query here 
    $query = 'select distinct itemCategory from catalog ORDER BY itemCategory ASC;';
    $result = mysqli_query($conn, $query) or die('Error! '. mysql_error($conn));
    $newArray = array();
    while($row = mysqli_fetch_array($result)) {
        array_push($newArray, $row['itemCategory']);
    }
    print json_encode($newArray);
?>