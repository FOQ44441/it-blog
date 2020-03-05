
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
	
	// exit();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="/media/css/user_style.css">
</head>
<body>
	<div>
		<?php
			if (isset($_POST['sign_up_btm'])) {
				$errors = array();
				if (empty($_POST['u_name']))
					$errors[] = 'Введите ваше имя';
				if (empty($_POST['u_login']))
					$errors[] = 'Придумайте логин';
				if (!isNicknameUnique($_POST['u_login']))
					$errors[] = 'Этот логин уже занят';
				if (empty($_POST['u_pass']))
					$errors[] = 'Придумайте пароль';

				if (isset($_POST['u_pass']) && isset($_POST['u_re_pass']))
					if ($_POST['u_pass'] !== $_POST['u_re_pass'])
						$errors[] = 'Ваши пароли не совпадают';
				// var_dump($errors);
				if (empty($errors)) {
					// exit();
					mysqli_query($connection, "INSERT INTO `users` (`name`, `login`, `password`) VALUES ('".$_POST['u_name']."', '".$_POST['u_login']."', '".$_POST['u_pass']."')");
					// echo "INSERT INTO `users` (`name`, `login`, `password`) VALUES ('".$_POST['u_name']."', '".$_POST['u_login']."', '".$_POST['u_pass']."')";
					echo $_POST['u_pass'];
					echo $_POST['u_re_pass'];
				} else {
					if (empty($errors))
						echo '<span style="color:green;font-weight:bold;margin-bottom:10px;display:block;">Комментарий успешно добавлен</span>';
					else
						echo '<span style="color:red;font-weight:bold;margin-bottom:10px;display:block;">' . $errors[0] . '</span>';
				}
			}
		?>
	</div>
<form method="POST">
<div class="container">
	<h1>Регисрация</h1>
	<p>Для регистрации нужно заполнить следующее:</p>
	<hr>
	<label for="u_name">Имя:</label>
	<input type="text" name="u_name" placeholder="Иван" value="<?php if (isset($_POST['u_name'])) echo $_POST['u_name']; ?>">
	<label for="u_login" placeholder="Znatok007">Логин:</label>
	<input type="text" name="u_login" placeholder="Znatok007" value="<?php if (isset($_POST['u_login'])) echo $_POST['u_login']; ?>">

	<label for="u_pass">Пароль:</label>
	<input type="password" name="u_pass" placeholder="@Ff$dfF154FF4t4">
	<label for="u_re_pass">Повторите пароль:</label>
	<input type="password" name="u_re_pass">

	<label for="remember_me">Запомнить меня</label>
	<input type="checkbox" name="remember_me">

	<p>Создавая аккаунт вы соглашаетесь с нашими <a style="color: dodgerblue;" href="#">Правилими использования.</a></p>

	<button type="submit" name="sign_up_btm" class="sign_up_btm">Регистрация!</button>
	<button type="botton" class="cansel_btm">Отмена</button>
</div>
<form>
</body>
</html>
