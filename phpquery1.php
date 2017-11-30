<?php
$url = 'http://rus.delfi.ee/'; 
$file = file_get_contents($url);
$pattern = '#<div class="col col-6.+?</div>#s';
preg_match($pattern, $file, $matches);
print_r($matches);
?>
<head>
  <meta http-equiv="refresh" content="20">
</head>