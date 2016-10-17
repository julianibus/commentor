<?php 
$conf = parse_ini_file('config',1);
$datafolder = $conf["datafolder"];


#retrieve data
$caller = $_GET['ref'];
$msg = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];

$datestamp = date("D M d, Y G:i");

$code = $datestamp . "#" . $name . "#" . $msg  . "#" . $email;
#spam protection
if(isset($_POST['url']) && $_POST['url'] == ''){
	$filename = $datafolder .  "/" . urlencode($caller) . ".txt";
	if (file_exists($filename)) {
		$fh = fopen($filename, 'a');
		fwrite($fh, $code."\n");
	} else {
		$fh = fopen($filename, 'w');
		fwrite($fh, $code."\n");
	}
fclose($fh);
          
} 
?>
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
<h1>Thanks</h1>

Your comment has been posted.
</body>
</html>
