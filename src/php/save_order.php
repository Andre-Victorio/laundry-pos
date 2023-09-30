<?php 
    include_once("db_connect.php");

    $retVal = "testing success";
    $isValid = true;
    $status = 400;

    $eid = $_SESSION['SESSIONID'];

    extract($_REQUEST);

    if($fname == ''){
        $data = "customer_firstname = NULL";
    } else{
        $data = "customer_firstname = '$fname'";
    }

    if($lname == ''){
        $data .= ", customer_lastname = NULL";
    } else{
        $data .= ", customer_lastname = '$lname'";
    }

    if($phone == ''){
        $data .= ", customer_phone = NULL";
    } else{
        $data .= ", customer_phone = '$phone'";
    }

    $data .= ", discount = '$discount'";
    $data .= ", grand_total = '$grandtotal'";
    $data .= ", amount_received = '$received'";
    $data .= ", amount_change = '$amount_change'";
    $data .= ", date = CURDATE()";
    $data .= ", time = CURRENT_TIME()";
    $data .= ", employee_id = '$eid'"; 

    $sql1 = "INSERT INTO orders set $data";

    // if($isValid){
    if($con->query($sql1) === TRUE){
        $id = $con->insert_id;
        foreach ($prod_qty as $key => $value) {
            $items = " order_id = '$id' ";
            $items .= ", product_id = '$prod_id[$key]' ";
            $items .= ", quantity = '$prod_qty[$key]' ";
            $items .= ", total = '$prod_total[$key]' ";
            $sql2 = $con->query("INSERT INTO order_details set $items");
        }
        $status = 200;
        $retVal = "Order added successfully.";
    }


    $myObj = array(
        'status' => $status,
        'message' => $retVal
    );

    $myJSON = json_encode($myObj, JSON_FORCE_OBJECT);
    echo $myJSON;
?>