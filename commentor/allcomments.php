<html>
<head>
<link rel="stylesheet" href="../template.css">
<link rel="stylesheet" href="template.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style>
.antispam { display:none;}
</style>
</head>
<body>
<h3>Comments</h3>
<?php 
$conf = parse_ini_file('config',1);
$datafolder = $conf["datafolder"];
$maxcomments = $conf["maxcomments"];

$caller = $_GET['ref'];
$filename = $datafolder . "/" . urlencode($caller) . ".txt";

#read file backwards
$file = file($filename);
$file = array_reverse($file);

$datestamp = "";
$name = "";
$message  = "";
$commentnr = 0;

foreach($file as $f){
	$commentnr += 1;
    $info = explode("#",$f);
    
    $datestamp = $info[0];
    $name = $info[1];
    $message = $info[2];
    
    echo "<p align='left'><span style='background-color: #000000; color:#FFFFFF'><b>&nbsp;" . $name . "&nbsp;</b></span>&nbsp;<span style='color:#afafaf;'>" . $datestamp . "</span><br></p><p align='left'> <i>" . $message . "</i></p>";
    
    
    if ($commentnr > $maxcomments) {
		break;
	}
}




?>
</body>
</html>
