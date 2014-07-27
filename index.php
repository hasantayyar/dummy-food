<?php
include './vendor/autoload.php';
use Hasantayyar\GetPost;
$get = new Hasantayyar\GetPost\Get('http://pipes.yahoo.com/pipes/pipe.run?FlickrID=69884632%40N00&Size=Large&Tagmode=all&Tags=travel&_id=59ee17da00a2c6b5af4eede29185a9b4&_render=json');
$data =  json_decode($get->send());
print_r($data); 
