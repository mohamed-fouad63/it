<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include '../../core/initialize.php';
require_once(INCLUDES_PATH.DS.'config.php');
require_once(CORE_PATH.DS.'dvice.php');

//instantiate dvice
$dvice = new Dvice($db);
// $dvice->office_name = $_POST['office_name'];

if($dvice->id != ''){
$dvice->id = $_POST['id'];
}
//blog dvice query
$read_dvice = $dvice->read();

//get the row count
$num_read_dvice = $read_dvice->rowCount();

if($num_read_dvice > 0){
    $dvice_arr = array();

    while($row_read_dvice = $read_dvice->fetch(PDO::FETCH_ASSOC)){

        $row_read_dvice_json[] = $row_read_dvice;
    }
    echo json_encode($row_read_dvice_json,JSON_UNESCAPED_UNICODE);
}
else {
    echo json_encode(array('message' => 'no data found'));
}
?>