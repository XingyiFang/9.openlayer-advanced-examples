<?php
$propertynames=$_REQUEST['proportyname'];
//$propertyname = 'obesityRMO';
//$url = $_REQUEST['url'];
$arrays = array();
$i = 0;
foreach ($propertynames as $name){
	$url = 'http://localhost:8080/geoserver/wfs?service=wfs&version=1.0.0&request=getfeature&typename=cite:stateobesity&PROPERTYNAME='.$name.'&outputFormat=application/json';
	$json = file_get_contents($url);
	$obj = json_decode($json, true);
	$data = $obj['features'];
	
	$array= array();
	foreach($data as $sub){
		//$array[$i][0]=$sub['id'];
		//$array[$i][1]=$sub['properties']['obesityRMO'];
		$array[$sub['id']]=$sub['properties'][$name];
	}
	//echo var_dump($data);
	//echo json_encode($array);
	$arrays[$i] = $array;
	$i = $i+1;
}
echo json_encode($arrays);
?>