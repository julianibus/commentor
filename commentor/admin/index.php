<?php
$username = "admin";
$password = "commentor";
$nonsense = "sostarbenwirumungetrenntewigeinigohneend";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>

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
$filecounter = 0;
foreach($files as $file) {
	if ($file == "." || $file == "..") {
		continue;
	}
	$path = $datafolder . "/" .$file;
	if ( 0 == filesize( $path ) )
	{
		continue;
	}
	$filecounter += 1;
	$fileo = file($path);
	$realurl = urldecode(pathinfo($file, PATHINFO_FILENAME));
	echo "<br><br><b>Page: <a href='" . $realurl . "'>" . $realurl . "</a></b>";
	$fileo = array_reverse($fileo);
	$commentscounter = 0;
	foreach($fileo as $f){
		$commentscounter += 1;
		
	    $info = explode("#",$f);
	    
	    $datestamp = $info[0];
	    $name = $info[1];
	    $message = $info[2];
	    $email = $info[3];
	    $id = $info[4];
		$ip = $info[5];
	    $buttons = '<br><a href="delete.php?idnr=' . $id . '&">DEL</a>&nbsp;&nbsp; | &nbsp;&nbsp;';
	    echo $buttons . $datestamp . "&nbsp;&nbsp;" . $name . "&nbsp;&nbsp;" . $email . "&nbsp;&nbsp;" . $id . "&nbsp;&nbsp;" . $ip .   "<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>" . $message ."</i>";
	    
	}
	echo "<br><br>(" . (string) $commentscounter . " comments)";
}

if ($filecounter == 0) {
	echo "No comments have been posted yet. Spread the word and check back later.";
}


?>

</body>
</html>


<?php
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['user'] != $username) {
      echo "Sorry, that username does not match.";
      exit;
   } else if ($_POST['keypass'] != $password) {
      echo "Sorry, that password does not match.";
      exit;
   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
      setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
      header("Location: $_SERVER[PHP_SELF]");
   } else {
      echo "Sorry, you could not be logged in at this time.";
   }
}
?>
<h1>Commentor</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
<label><input type="text" name="user" id="user" /> Name</label><br />
<label><input type="password" name="keypass" id="keypass" /> Password</label><br />
<input type="submit" id="submit" value="Login" />
</form>
