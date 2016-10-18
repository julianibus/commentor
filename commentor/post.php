<?php 
error_reporting(E_ERROR | E_PARSE);
$conf = parse_ini_file('config',1);
$datafolder = $conf["datafolder"];


$success = True;
$errmesage = "";

#retrieve data
$caller = $_GET['ref'];
$msg = $_POST['message'];
$name = $_POST['name'];
$email = $_POST['email'];
$datestamp = date("D M d, Y G:i");
$id =  time();
$code = $datestamp . "#" . $name . "#" . $msg  . "#" . $email . "#" . $id;
#form validation


if(empty($name)){
	$success = False;
	$errmessage .= "Please provide a name.<br>";
}

if(strlen($msg) < 1){
	$success = False;
	$errmessage .= "Please provide a message.<br>";
}

if (strpos($name, '#') == True) {
	$success = False;
	$errmessage .= "Your name contains invalid characters.<br>";
}
if (preg_match("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email)) {
	$success = False;
	$errmessage .= "Your email appears to be invalid.<br>";
}
	
if (strpos($msg, '#') == True) {
	$success = False;
	$errmessage .= "Your message contains invalid characters.<br>";
}

$errmessage = "<font color='red'>" . $errmessage . "</font><br><br><a href='/commentor/index.php?ref=" . $caller . "'>Go back</a>";

#spam protection
if(isset($_POST['url']) && $_POST['url'] == '' && $success == True){
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
<?php
if ($success == True) {
	echo "<h1>Thanks</h1>Your comment has been posted.<br><br><a href='/commentor/index.php?ref=" . $caller . "'>Show comments</a>";
}
else {
	echo $errmessage;	
}
?>
</body>
</html>
