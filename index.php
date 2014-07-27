<?php
include './vendor/autoload.php';
use Hasantayyar\GetPost;

$cacheFile = './cache/'.date('HdmY',time());
if(file_exists($cacheFile)){
	$jsonData = file_get_contents($cacheFile);	
}else{
	$url = 'http://pipes.yahoo.com/pipes/pipe.run'; //'FlickrID=69884632%40N00&Size=Large&Tagmode=all&Tags=travel&_id=59ee17da00a2c6b5af4eede29185a9b4&_render=json';
	$tags = 'food';
	$params = array(
	//'FlickrID'=>'7204959@N04',
	'Size'=>'Medium', //Square',
	'Tagmode'=>'all',
	'Tags'=>$tags,
	'_id'=>'59ee17da00a2c6b5af4eede29185a9b4',
	'_render'=>'json'
	);
	$fullUrl = $url.'?'.http_build_query($params);
	$get = new Hasantayyar\GetPost\Get($fullUrl);
	$jsonData = $get->send();
	$f = fopen($cacheFile,'w');
	fwrite($f,$jsonData);
	fclose($f);
}

$data =  json_decode($jsonData);
$rand = array_rand($data->value->items); 

echo json_encode($data->value->items[$rand]);
