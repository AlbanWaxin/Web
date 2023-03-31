
<h1>Page de connexion</h1>
<form action="/doctors/login" method="post" >
	<label for="email" class = "form-label">Email</label>
	<input type="text" id="email" name="email" class = "form-controll d-flex flex-column">

	<label for="password" class = "form-label">Mot de passe</label>
	<input type="password" id="password" name="password" class = "form-controll mb-3 d-flex flex-column" >

	<input type="submit" value="Se connecter" class = "btn btn-primary btn-sm">

	<div class="forgot-password">
		<a href="#">Mot de passe oublié ?</a>
	</div>

	<div class="error-message">
		<?php
			//var_dump($data);
			if(isset($data['email_error'])) {
				echo $data['email_error'];
			}
			if(isset($data['password_error'])) {
				echo $data['password_error'];
			}
			?>
	</div>
</form>