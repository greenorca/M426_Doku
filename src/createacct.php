<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	require_once 'controller/CreateAcctController.php';
	$controller = new CreateAcctController();
?>
<!DOCTYPE html>
<html>
<head>
	<!--
		Lots of Stuff will  be added here later.

		Just a little prototype

	-->
	<title>Neuer Benutzer registrieren</title>
</head>
<body>
	<?php
		if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['group'])){
			/*$controller->setUsername($controller->stripHtmlTags($_POST['name']));
			$controller->setFirstname($controller->stripHtmlTags($_POST['firstname']));
			$controller->setEmail($controller->stripHtmlTags($_POST['email']));
			$controller->setPassword(crypt($_POST['password'],$controller->generateSalt()));
			$controller->setGroup($controller->stripHtmlTags($_POST['group']));
			$controller->saveUser();*/
			var_dump($_POST['group']);

			header("Location: createacct.php");
		}
	?>
	<form action="?" method="POST">
		<label for="#name">Name</label>
		<input name="name" id="name" type="text" placeholder="Name">
		<label for="#firstname">Vorname</label>
		<input name="firstname" id="firstname" type="text" placeholder="Vorname">
		<label for="#email">E-Mail</label>
		<input name="email" id="email" type="email" placeholder="E-Mail">
		<label for="#passwd">Passwort</label>
		<input name="passwd" id="passwd" type="password" placeholder="Passwort">
		<label for="#group">Gruppe</label>
		<select name="group" id="group">
			<?php
				$groups = $controller->retreiveGroups();
				foreach($groups as $group){
					echo "<option value='".$group."'>".$group."</option>";
				}
			?>
		</select>
		<input type="submit" value="Benutzer erstellen">
	</form>
</body>
</html>
