<?php
$url = 'https://tpt.siseveeb.ee/veebivormid/tunniplaan/tunniplaan?oppegrupp=200&nadal=27.11.2017'; 
$file = file_get_contents($url);
$pattern = '#<div class="btn-group.+?</div>#s';
preg_match($pattern, $file, $matches);
print_r($matches);
?>

<head>
 <meta http-equiv="refresh" content="10000">
</head>
