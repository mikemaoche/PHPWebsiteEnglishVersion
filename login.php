<?php
	require_once("partial/header.php");
?>

	<div id="idCadreLogin" class="cadreLogin">
		<form method="post" action="login.php?etatConnexion=1">
			<h3>SIGN IN</h3>
	        <p><input type="text" name="login" value="" placeholder="Username or email"></p>
	        <p><input type="password" name="pwd" value="" placeholder="Password"></p>
        	<p><input type="submit" name="commit" value="Connexion"></p>
        	<a href="inscription.php">Don't you get account yet ? Sign up here.</a>
      	</form>
	</div>
	<div class="clearboth"></div>

	
<?php
	require_once("partial/footer.php");
?>
