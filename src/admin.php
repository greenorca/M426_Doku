<?php
    $page = "admin";
    require_once 'controller/CreateAcctController.php';
        $controller = new CreateAcctController();

        /**
        *
        * TODO: Check if user is an admin and serve the page differently to non admins
        *
        */
        if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['passwd']) && isset($_POST['group'])) {
            $name = $controller->stripHtmlTags($_POST['name']);
            $firstname = $controller->stripHtmlTags($_POST['firstname']);
            $email = $controller->stripHtmlTags($_POST['email']);
            $password = crypt($_POST['passwd'], $controller->generateSalt());
            if (isset($_POST['isAdmin']) && $_POST['isAdmin'] == "true") {
                $isAdmin = true;
            } else {
                $isAdmin = false;
            }
            $groupName = $controller->stripHtmlTags($_POST['group']);
            if ($controller->createUser($name, $firstname, $email, $password, $isAdmin, $groupName)) {
                header("Location: admin.php?success");
            } else {
                header("Location: admin.php?error");
            }
        }
    ?>
<!DOCTYPE html>
<html>
<head>
		<?php require_once 'view.template/head.php';?>
    <title>Admin panel - Sierra</title>
</head>
	<body>
    <?php require_once 'view.template/nav.php'; ?>
		<div class="container topSpacer">
			<h1>Benutzer erfassen</h1>
				<form class="userForm" action="?" method="POST">
					<input class="form-control" name="name" id="name" type="text" placeholder="Name">
					<input class="form-control" name="firstname" id="firstname" type="text" placeholder="Vorname">
					<input class="form-control" name="email" id="email" type="email" placeholder="E-Mail">
					<input class="form-control" name="passwd" id="passwd" type="password" placeholder="Passwort">
          <div class="form-group">
            <select class="form-control" name="group" id="group">
  						<?php
                      $groups = $controller->retreiveGroups();
                      foreach ($groups as $group) {
                          echo "<option value='".$group."'>".$group."</option>";
                      }
                      ?>
  					</select>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" name="isAdmin" id="isAdmin" value="true"> Ist der Nutzer Admin?</label>
          </div>
					<input class="btn btn-success btnSubmit" type="submit" value="Benutzer erstellen">
				</form>
		</div>
    <?php require_once 'view.template/footer.php';?>
	</body>
</html>
