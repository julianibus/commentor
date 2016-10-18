<?php
$conf = parse_ini_file('config',1);
$datafolder = $conf["datafolder"];

$files = scandir($datafolder);
foreach($files as $file) {
  
	$fileo = file($file);
	echo "<b>Page: " . $file;
	$fileo = array_reverse($fileo);
	
  
  
}


?>
