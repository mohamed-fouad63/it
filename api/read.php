<?php
//headers
header('Accesss-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initializing our api
include '../core/initialize.php';
require_once(INCLUDES_PATH.DS.'config.php');
require_once(CORE_PATH.DS.'dvice.php');
//instantiate dvice
$dvice = new Dvice($db);

//blog dvice query
$result = $dvice->read();

//get the row count
$num = $result->rowCount();

if($num > 0){
    $dvice_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){

        $emparray[] = $row;
    }
    echo json_encode($emparray,JSON_UNESCAPED_UNICODE);

}
else {
    echo json_encode(array('message' => 'no data found'));
}
?>