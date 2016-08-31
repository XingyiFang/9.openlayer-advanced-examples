<?php
$url = $_REQUEST['url'];
//$url = 'http://localhost:8080/geoserver/wfs?service=WFS&version=1.0.0&request=DescribeFeatureType&typename=cite:stateobesity&outputFormat=application/json';
$json = file_get_contents($url);
$obj = json_decode($json, true);
//echo $obj['featureTypes'][0]['properties'][0]['name'];
$data = $obj['featureTypes'][0]['properties'];
//echo implode(',', $obj['featureTypes'][0]['properties'][0]);
//$data = (json_decode($json, true));
//$content = '<select id="fields" multiple="multiple">';
$array= array();
$i=0;
foreach($data as $sub){
	$array[$i][0]=$sub['name'];
	$i= $i+1;
	
	//$content .= '<option value="'.$sub['name'].'">';
	//$content .= $sub['name'];
	//$content .= '</option>';
}
//$content .='</select>';
//echo var_dump($array);
//echo $content;
echo json_encode($array);
?>