<?php
	require_once "../includes/config.php";

	function isNicknameUnique($nickname) {
		global $connection;
		
		// var_dump($nickname);
		$result = mysqli_query($connection, "SELECT `login` FROM `users` WHERE `login` = '".$nickname."'");
		// debug($result->num_rows);
		if ($result->num_rows == 0)
			return (true);
		return(false);
	}

	$xyi = 55;
		function isLoginDataMatched($login, $pass) {
			// echo 'HELLO';
			// exit();
		 global $connection;	
		$sqlRes = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '".$login."'");
		// debug($result->num_rows);
		$result = mysqli_fetch_assoc($sqlRes);
		if (isset($result['password']))
			if ($result['password'] == $pass)
				return (true);
		return(false);
	}
	// exit();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Логин</title>
	<link rel="stylesheet" type="text/css" href="/media/css/user_style.css">
</head>
<body>

	<div>		
		<?php
			if (isset($_POST['sign_up_btm'])) {
				$errors = array();
				if (empty($_POST['u_login']))
					$errors[] = 'Введите логин';
				if (empty($_POST['u_pass']))
					$errors[] = 'Введите пароль';
				if (!isLoginDataMatched($_POST['u_login'], $_POST['u_pass'])) {
					$errors[] = 'Логин и/или пароль введены не верно';
				}
				// var_dump($errors);
				//if (empty($errors)) {
					// exit();
					// mysqli_query($connection, "INSERT INTO `users` (`name`, `login`, `password`) VALUES ('".$_POST['u_name']."', '".$_POST['u_login']."', '".$_POST['u_pass']."')");
					// echo "INSERT INTO `users` (`name`, `login`, `password`) VALUES ('".$_POST['u_name']."', '".$_POST['u_login']."', '".$_POST['u_pass']."')";
					//echo $_POST['u_pass'];
					//echo $_POST['u_re_pass'];
				// } else {

					if (empty($errors))
						echo '<span style="color:green;font-weight:bold;margin-bottom:10px;display:block;">Вы авторизированы</span>';
					else
						echo '<span style="color:red;font-weight:bold;margin-bottom:10px;display:block;">' . $errors[0] . '</span>';
				//}
			}
		?>
	</div>
<form method="POST">
<div class="container">
	<h1>Вход</h1>
	<p>Введите ваш логин и пароль:</p>
	<hr>

	<label for="u_login" placeholder="Znatok007">Логин:</label>
	<input type="text" name="u_login" placeholder="Znatok007" value="<?php if (isset($_POST['u_login'])) echo $_POST['u_login']; ?>">

	<label for="u_pass">Пароль:</label>
	<input type="password" name="u_pass" placeholder="@Ff$dfF154FF4t4">

	<label for="remember_me">Запомнить меня</label>
	<input type="checkbox" name="remember_me">

	<button type="submit" name="sign_up_btm" class="sign_up_btm">Войти</button>
	<button type="botton" class="cansel_btm">Отмена</button>
</div>
<form>
</body>
</html>
