<?php $page = "login"; ?>
<!DOCTYPE html>
<html>
	<head>
		    <?php require_once 'view.template/head.php'; ?>
		    <title>Login - Sierra</title>
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
                if ($controller->checkUserLogin()) {
                    header("Location: index.php");
                } else {
                    header("Location: login.php?error=incorrectinfo");
                }
            }
            ?>
						<?php require_once 'view.template/nav.php'; ?>
	<div class="container topSpacer">
		<form class="userForm" action="?" method="POST">
			<input class="form-control" type="email" name="email" id="email" placeholder="E-Mail">
			<input class="form-control" type="password" name="password" id="password" placeholder="Passwort">
			<input class="btn btn-success btnSubmit" type="submit" value="Einloggen">
		</form>
	</div>


		<!--JavaScript Start-->
		<!--JavaScript Ende-->
	</body>
<?php require_once 'view.template/footer.php';?>
</html>
