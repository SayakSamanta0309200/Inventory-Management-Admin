<?php
    $servername = 'localhost';
    $username = 'root';
    $password = 'sayak123';
    $database = 'admindash_db';

    $conn=mysqli_connect($servername,$username,$password,$database);

    /*if(!$conn){
        die("connection failed".mysqli_connect_error());
    }
    else{
        echo "Connected successfully";
    }*/

    echo '<table border="1px solid black" cellspacing="2" cellpadding="2"> 
            <tr> 
                <td style="padding-right: 5px"> <font face="Arial">Order Id</font> </td> 
                <td style="padding-right: 5px"> <font face="Arial">Customers</font> </td> 
                <td style="padding-right: 5px"> <font face="Arial">Items</font> </td> 
                <td style="padding-right: 5px"> <font face="Arial">Order</font> </td> 
                <td style="padding-right: 5px"> <font face="Arial">Order Amount</font> </td>
                <td style="padding-right: 5px"> <font face="Arial">Order Date and Time</font> </td>
                <td style="padding-right: 5px"> <font face="Arial">Order Status</font> </td>
            </tr>';
    $query1 = "SELECT `fld_ai_id` FROM `tbl_orders`";
    $query2 = "SELECT `fld_name` FROM `tbl_customers` INNER JOIN `tbl_orders` ON `tbl_customers`.`fld_ai_id`=`tbl_orders`.`fld_customer_id`";
    $query3 = "SELECT `fld_items` FROM `tbl_items` INNER JOIN `tbl_orders` ON `tbl_items`.`fld_ai_id`=`tbl_orders`.`fld_item_id`";
    $query4 = "SELECT `fld_order` FROM `tbl_orders`";
    $query5 = "SELECT `fld_orderamt` FROM `tbl_orders`";
    $query6 = "SELECT `fld_orderdate` FROM `tbl_orders`";
    $query7 = "SELECT `fld_order_status` FROM `tbl_orders`";
    
    $sqlquery = array($query1,$query2,$query3,$query4,$query5,$query6,$query7);
    $field = array("fld_ai_id","fld_name","fld_items","fld_order","fld_orderamt","fld_orderdate","fld_order_status");
    for($ele=0;$ele<7;$ele++){
        if ($result = $conn -> query($sqlquery[$ele])) {
            $fieldname = "";
            while ($row = $result->fetch_assoc()) {
                /*$field1name = $row[$field[0]];
                $field2name = $row[$field[1]];
                $field3name = $row[$field[2]];
                $field4name = $row[$field[3]];
                $field5name = $row[$field[4]];
                $field6name = $row[$field[5]];
                $field7name = $row[$field[6]];*/

                if($field[$ele]=="fld_ai_id"){
                    $fieldname = $row[$field[$ele]];
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }
                if($field[$ele]=="fld_name"){
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }
                if($field[$ele]=="fld_items"){
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }
                if($field[$ele]=="fld_order"){
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }
                if($field[$ele]=="fld_orderamt"){
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }
                if($field[$ele]=="fld_orderdate"){
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }
                if($field[$ele]=="fld_order_status"){
                    echo '<tr>
                        <td>'.$fieldname.'</td>
                    </tr>';
                }

            }
            // Free result set
            $result -> free_result();
        }
    }
?>
