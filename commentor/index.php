<?php
$caller = $_SERVER['HTTP_REFERER'];
error_reporting(E_ERROR | E_PARSE);
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
<?php echo '<form action="/commentor/post.php?ref=' . $caller . '" method="post">';  ?>
<form action="/commentor/post.php" method="post">

    <p><input type="text" name="name" style="width: 24%;" placeholder="name"/><input style="width: 24%;" type="text" name="email" placeholder="email (not visible)"/></p>

    <p class="antispam">Leave this empty: <input type="text" name="url" style="width: 24%;"/></p>

    <p><textarea name="message" style="min-width:100px; width: 48%;" placeholder="comment"></textarea></p>
    <input type="submit" style="background-image:url(res/submit.png); width:74px; height:30px;" alt="Berechnen" name="submit" value=" ">

    </p>

</form>

<h3>Comments</h3>
<?php 
$conf = parse_ini_file('config',1);
$datafolder = $conf["datafolder"];
$maxcomments = $conf["maxcomments"];

$caller = $_SERVER['HTTP_REFERER'];
$filename = $datafolder . "/" . urlencode($caller) . ".txt";

#read file backwards

if (file_exists($filename) == False) {
    echo "<i>No comments posted yet.</i>";
    die();
}
$file = file($filename);
$file = array_reverse($file);

$datestamp = "";
$name = "";
$message  = "";
$commentnr = 0;

$out = "";

foreach($file as $f){
	$commentnr += 1;
    $info = explode("#",$f);
    
    $datestamp = $info[0];
    $name = $info[1];
    $message = $info[2];
    
    $out = $out . "<div style='background-color:eeeeee;'><p align='left'><span style='background-color: #000000; color:#FFFFFF'><b>&nbsp;" . $name . "&nbsp;</b></span>&nbsp;<span style='color:#afafaf;'>" . $datestamp . "</span><br></p><p align='left'> <i>" . $message . "</i></p></div>";
    
    
    if ($commentnr > $maxcomments) {
		break;
	}
}

echo $out;


?>
</body>
</html>

