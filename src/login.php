<!DOCTYPE html>
<html>
<head>
	<!--
		Lots of Stuff will  be added here later.

		Just a little prototype

	-->
	<title>Login</title>
</head>
<body>
	<?php
    if (isset($_POST['email']) && isset($_POST['password'])) {
        require_once 'controller/LoginController.php';
        $controller = new LoginController();
        $email  = $controller->stripHtmlTags($_POST['email']);
        $password = $_POST['password'];

        $controller->setEmail($email);
        $controller->setPassword($password);
				echo $controller->checkUserLogin();
        if ($controller->checkUserLogin()) {
            header("Location: index.php");
        } else {
            header("Location: login.php?error=incorrectinfo");
        }
    }
    ?>
	<form action="?" method="POST">
		<label for="#email">E-Mail</label>
		<input name="email" id="email" type="email" placeholder="E-Mail">
		<label for="#password">Passwort</label>
		<input name="password" id="password" type="password" placeholder="Passwort">
		<input type="submit" value="Einloggen">
	</form>
</body>
</html>
