<html>
<head>
<link rel="stylesheet" href="../template.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>Commentor</h1>
<?php
if (isset($_GET['idnr'])) { 
	$code = $_GET['idnr']; 
} else { 
	$code = "0"; 
} 
echo "Marked for removal: " . $code . "<br><br>";

$conf = parse_ini_file('../config',1);
$datafolder = "../" . $conf["datafolder"];

$files = scandir($datafolder);

$counter = 0;

foreach($files as $file) {
	if ($file == "." || $file == "..") {
		continue;
	}
	$path = $datafolder . "/" .$file;
	
	if ( 0 == filesize( $path ) )
	{
		continue;
	}
	
	
	$fileo = file($path);
	$fileo = array_reverse($fileo);
	
	$cleanedcontent = "";
	$scounter = 0;
	foreach($fileo as $f){
		$scounter += 1;
	    $info = explode("#",$f);
	    
	    $datestamp = $info[0];
	    $name = $info[1];
	    $message = $info[2];
	    $email = $info[3];
	    $id = $info[4];
	    $ip = $info[5];
	    
	    if ($f == ""){ #if empty line
			continue;
		}
	    if (trim($id) == trim($code)){ #if match
			$counter = $counter + 1;
			continue;
		}
		
		if ($scounter != 1) {
			$cleancontent .= "\n";
		}
		$cleanedcontent = $cleanedcontent . $f;
	    
	}
	
	file_put_contents($path,$cleanedcontent);
	
	
}

echo (string) $counter . " comment deleted.";
echo "<br><br><a href='/commentor/admin'>Back</a>";

?>

</body>
</html>
