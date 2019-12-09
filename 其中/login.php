<?PHP
	$server      = "localhost";		
	$db_username = "root";			
	$db_password = "";				
	$db_name     = "user";
	$connect = mysqli_connect($server, $db_username, $db_password, $db_name);
	mysqli_set_charset($connect, "utf8");
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登入</title>
</head>
<body>
	<form name="login" action="login.php" method="post">
		<p>使用者名稱<input type=text name="name"></p>
		<p>密 碼<input type=password name="password"></p>
		<p><input type="submit" name="submit" value="登入"></p>
	</form>
	<p><button id="home">回主頁</button></p>
	<?php
		if(isset($_POST["submit"])) {
			$select = "select `name`, `password` from `user`";
			$employeeData = mysqli_query($connect, $select);

			for($i = 0; $i < mysqli_num_rows($employeeData); $i++) {
				$login = mysqli_fetch_array($employeeData, MYSQLI_ASSOC);

				if($_POST["name"] == $login["name"] && $_POST["password"] == $login["password"]) {
					echo "<script>window.location.href='./welcome.html'</script>";
				}
			}
			
			echo "<script>alert('帳號或密碼錯誤');</script>";
		}

	?>
</body>
</html>