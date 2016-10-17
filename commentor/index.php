<?php
$caller = $_GET["ref"];
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

    <p>Your name: <input type="text" name="name" /></p>

    <p>Your email: <input type="text" name="email" /></p>

    <p class="antispam">Leave this empty: <input type="text" name="url" /></p>

    <p><textarea name="message"></textarea></p>

    <p><input type="submit" value="Send" /></p>

</form>

</body>
</html>

