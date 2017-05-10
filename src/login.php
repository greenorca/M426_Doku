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
	<form action="controller/LoginController.php" method="POST">
		<label for="#username">Benutzername</label>
		<input name="username" id="username" type="text" placeholder="Benutzername">
		<label for="#passwd">Passwort</label>
		<input name="passwd" id="passwd" type="password" placeholder="Passwort">
		<input type="submit" value="Einloggen">
	</form>
</body>
</html>