
<?php
	require_once("partial/header.php");
?>
	<div id="idCadreInscription" class="cadreInscription">
		<form id="formInscription" method="post" action="action/actionInscription.php">
			<h3>SIGN UP</h3>
			<div class="divInscriptionText">
				<p>Username</p>
				<p>Email</p>
				<p>Password</p>
				<p>Type to confirm your password</p>
			</div>
			<div class="divInscriptionInput">
				<input id="idNom" type="text" name="name" placeholder="Type a name...">
				<input id="idEmail" type="text" name="email" placeholder="Type an Email...">
				<input id="idMdp1" type="password" name="password1" placeholder="Type a password...">
				<input id="idMdp2" type="password" name="password2" placeholder="Retype your password...">
			</div>			
			<div class="clearboth"></div>
			<input id="idInscrire" type="submit" name="inscrire" value="Valider" disabled>
			<a href="login.php">Have you got an account ? Try to Log in.</a>
		</form>
	</div>
	<script>

	</script>
	<script type="text/javascript" src="js/verificationChamps.js">
	</script>
<?php
	require_once("partial/footer.php");
?>