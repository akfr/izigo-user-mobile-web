<?php
 include('config.php');

if(isset($_POST['action'])) {
    if ($_POST['action'] == "getDriverLivePosition") { 
        getDriverLivePosition($con, $_POST['driverId']); 
    } elseif ($_POST['action'] == "getOrderInfo") {
        $orderId = $_POST['orderId'];
        getOrderInfo($con, $orderId); 
    }
}

function getDriverLivePosition($con, $driverId) {
    $query = "select dmp.latitude, dmp.longitude, dm.f_name, dm.l_name, dm.phone, dm.identity_number from " .
    " delivery_men_position dmp join delivery_men dm on dm.id = dmp.deliveryman_id where dmp.deliveryman_id = " . $driverId;
    $res = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_object($res);
    echo json_encode(['latitude' => $row->latitude, 'longitude' => $row->longitude, 
        'f_name' => $row->f_name, 
        'l_name' => $row-> l_name, 'phone' => $row->phone, 'identity_number' => $row->identity_number]);
}

function getOrderInfo($con, $orderId) {
    $query = "select * from orders where id = " . $orderId;
    $res = mysqli_query($con, $query) or die(mysqli_error($con));
    $row = mysqli_fetch_object($res);
    echo json_encode(['origin_address' => $row->origin_address, 
    'destination_address' => $row->destination_address, 
    "delivery_man_id" => $row->delivery_man_id, 'status' => $row->order_status]);
}
?>
