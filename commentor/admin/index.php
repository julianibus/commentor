<html>
<head>
<link rel="stylesheet" href="../template.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

</head>
<body>
<h1>Commentor</h1>
<?php
$conf = parse_ini_file('../config',1);
$datafolder = "../" . $conf["datafolder"];

$files = scandir($datafolder);
foreach($files as $file) {
	if ($file == "." || $file == "..") {
		continue;
	}
	$fileo = file($datafolder . "/" .$file);
	echo "<br><br><b>Page: <a href='" . urldecode($file) . "'>" . urldecode($file) . "</a></b>";
	$fileo = array_reverse($fileo);
	
	foreach($fileo as $f){
	    $info = explode("#",$f);
	    
	    $datestamp = $info[0];
	    $name = $info[1];
	    $message = $info[2];
	    $email = $info[3];
	    
	    $buttons = "<br><a href='delete.php?code='" . $code . "'>DEL</a>&nbsp;&nbsp; | &nbsp;&nbsp;";
	    echo $buttons . $datestamp . "&nbsp;&nbsp;" . $name . "&nbsp;&nbsp;" . $email . "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>" . $message ."</i>";
	    
	}
}


?>

</body>
</html>
