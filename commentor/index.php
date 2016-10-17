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

    <p><input type="text" name="name" style="width: 24%;" placeholder="name"/><input style="width: 24%;" type="text" name="email" placeholder="email"/></p>

    <p class="antispam">Leave this empty: <input type="text" name="url" style="width: 24%;"/></p>

    <p><textarea name="message" style="min-width:100px; width: 48%;" placeholder="comment"></textarea></p>
    <img src="res/submit.png" onclick="document.forms['formName'].submit();">
    </p>

</form>

</body>
</html>

