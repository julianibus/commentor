<?php 
#retrieve data
$caller = $_SERVER['HTTP_REFERER'];
$msg = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];

$date = date();
$datestamp = (string) date_format($date, 'Y-m-d H:i:s');

$code = $datestamp . "," . $name . "," . $msg;
#spam protection
if(isset($_POST['url']) && $_POST['url'] == ''){
	$filename = "../commentor/data/" . urlencode($caller) . ".txt";
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

You comment has been posted.
<a href="javascript:history.back()">Go Back</a>
</body>
</html>
