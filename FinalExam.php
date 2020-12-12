<?php

// Inclues FinalDatabase.php which contains database class
include 'FinalDatabase.php';

//instance of database class
$database = new DB();

//get contest of json file to fill database
$string = file_get_contents("FinalAPI.json");
$stdInstance = json_decode($string, true);

//Get methods
//this get method is used to get all filling values
foreach ($stdInstance['Database']['Fillings'] as &$fvalue) {
    $database->addFilling($fvalue['Name'], $fvalue['Taste']);
}

//This get method is used to get all pie values
foreach ($stdInstance['Database']['Pies'] as &$pvalue) {
    $database->addPie($pvalue['Name'], $pvalue['Price']);
}

//
$orderArray = $database->getOrder();
print_r($orderArray);
$postJsonArray = array();
$orderint = 1;
while($row = mysqli_fetch_assoc($orderArray)) {
    array_push($postJsonArray, array("Order " . $orderint, $row['Orderer_Name'], $row['Baker_Name'], $row['Order_Start'], $row['Order_Pickup']));
	$orderint += 1;
}
print_r($postJsonArray);
array_push($stdInstance['Database']['Orders'],$postJsonArray);
$jsonOrderData = json_encode($stdInstance);
file_put_contents("FinalAPI.json", $jsonOrderData);