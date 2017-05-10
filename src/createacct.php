<?php
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
		if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['group'])){
			$controller->setUsername();
		} else {

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
		<label for="#gruppe">Gruppe</label>
		<select name="gruppe" id="gruppe">
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
