<!DOCTYPE html>
<html>
<head>
	<title>Page de connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" href="../../../public/css/style_login.css">
		
		
	</style>
</head>
<body>
	<?php
		var_dump($data);
	?>
	<h1>Page de connexion</h1>
	<form action="/" method="post">
		<label for="email">Email</label>
		<input type="text" id="email" name="email" required>

		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password" required>

		<input type="submit" value="Se connecter">

		<div class="forgot-password">
			<a href="#">Mot de passe oublié ?</a>
		</div>

		<div class="error-message">
			<?php
				if(isset($error_message)) {
					echo $error_message;
				}
			?>
		</div>
	</form>
</body>
</html>
