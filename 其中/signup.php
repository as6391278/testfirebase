<?PHP
	$server      = "localhost";		
	$db_username = "root";			
	$db_password = "";				
	$db_name     = "user";
	$connect = mysqli_connect($server, $db_username, $db_password, $db_name);
	mysqli_set_charset($connect, "utf8");
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>使用者註冊頁面</title>
</head>
<body>
	<form method="post">
		<p>使用者名稱:<input type="text" name="name"></p>
		<p>密 碼: <input type="text" name="password"></p>
		<p><input type="submit" name="submit" value="註冊"></p>
	</form>
	<p><input type="submit" id="home" value="回主頁"></p>
	<script>
		document.getElementById('home').onclick = function(){
			window.location.href='./index.html'
		};
	</script>
	<?php
		if(isset($_POST["submit"])) {
			$insert = 'INSERT INTO `user`(`name`, `password`) VALUES ("'.$_POST["name"].'", "'.$_POST["password"].'")';
			$doIt = mysqli_query($connect, $insert);
		}
	?>
</html>
</body>