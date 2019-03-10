<?php
    //Connect to database
    $conn=mysqli_connect('sophia.cs.hku.hk', 'jmall', 'EzTUTpDS') or die('Error! '. mysqli_error($conn));
    //Select database
    mysqli_select_db($conn, 'jmall') or die('Error! '. mysqli_error($conn));
    //Construct your SQL query here 
    $query = 'select * from catalog';
    if ($_GET["category"]=="Books"){
        $subQuery = ' WHERE `itemCategory` = \''.$_GET["category"].'\'';
        $totalQuery = $query.$subQuery;
    }else if ($_GET["category"]=="Laptops"){
        $subQuery = ' WHERE `itemCategory` = \''.$_GET["category"].'\'';
        $totalQuery = $query.$subQuery;
    }else if ($_GET["category"]=="Speakers"){
        $subQuery = ' WHERE `itemCategory` = \''.$_GET["category"].'\'';
        $totalQuery = $query.$subQuery;
    }
    $result = mysqli_query($conn, $query) or die('Error! '. mysql_error($conn));
    while($row = mysqli_fetch_array($result)) {
        print       "<tr>
                        <td>
                            <img id=\"shopping-cart-icon\" src=\"".$row['itemImage']."\" alt=\"Shopping Cart\">
                        </td>
                        <td>
                            <table>
                            <tr>
                                <p>
                                    ".$row['itemName']."
                                </p>
                            </tr>
                            <tr>
                                <p>
                                    ".$row['itemPrice']."
                                </p>
                            </tr>
                            <tr>
                                <p>
                                    ".$row['itemDescription']."
                                </p>
                            </tr>
                            <tr>
                                <p>
                                    Add to Cart
                                </p>
                            </tr>
                        </table>
                        </td>
                    </tr>";
    }
?>