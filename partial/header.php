<?php
	require_once("action/indexAction.php");
	$error= isset($_GET['error']) ? $_GET['error']: '';
	require_once("action/session-uploadAction.php");
	#var_dump($_SESSION["visibility"]);
	$visible = isset($_SESSION["visibility"]) ? $_SESSION["visibility"] : 0;
	uploadImage();
	if($visible == 0 && !empty($_GET["error"])){
		$error = $_GET["error"];
	}
	#var_dump($_SESSION["photoProfil"]);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>MyTvChannel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="css/decor.css">
	<script type="text/javascript" src="js/creationBalises.js"></script>
	<script type="text/javascript" src="js/events.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<script type="text/javascript" src="js/notify.js"></script>
	<!-- change le texte du input file (par défaut : "choississez un fichier") -->
	<script type="text/javascript">
		function getfile(){
	        document.getElementById('idFile').click();
	    }
	</script>
</head>
<body>
<?php 
	if($visible == 1)
	{
?>
<div class="entete">
	<header>
		<h1>MyTvChannel</h1>
		<div class="containerLogin">
			<a title="user profile" href="session-client.php"><img alt="imgClient" src=<?php 
			$img = !empty($_SESSION["photoProfil"]) ? $_SESSION["photoProfil"] : '';
			echo  $img ?>></a>
			<div class="logout">
				<a title="logout" href="index.php?etatConnexion=0&action=true"><img alt="imgLogout" src="images/logout.png"></a>
			</div>
		</div>
	</header>
	<div class="englobeMenu">
		<nav id="menuPrincipal" class="menuPrincipal"><script>creerMenuPrincipal();</script></nav>
	</div>
</div>
<?php
	}
	else if($visible == 0)
	{
?>
<div class="entete">
	<header>
		<h1>MyTvChannel</h1>	
		<div class="bouttonsLogIns">
			<script>
				creerButtonsLogIns();
			</script>
		</div>
	</header>
	<div class="englobeMenu">
		<nav id="menuPrincipal" class="menuPrincipal"><script>creerMenuPrincipal();</script></nav>
	</div>
</div>

<?php 
	}
	else if($visible == 3)
	{
?>
	<div class="entete">
			<header>
				<h1>MyTvChannel</h1>
				<div class="containerLogin">
					<a title="admin profile" href="session-admin.php"><img alt="imgClient" src=<?php 
					$img = !empty($_SESSION["photoProfil"]) ? $_SESSION["photoProfil"] : "aucun";
					echo  $img ?>></a>
					<div class="logout">
						<a title="logout" href="index.php?etatConnexion=0&action=true"><img alt="imgLogout" src="images/logout.png"></a>
					</div>
				</div>
			</header>
		<div class="englobeMenu">
			<nav id="menuPrincipal" class="menuPrincipal"><script>creerMenuPrincipal();</script></nav>
		</div>
	</div>
<?php
	}
	switch ($error) {
		case 1:
			?>
			<script>$.notify("Warning: Unknown Member",{className:"warn",position:"top center"});</script>
			<?php
			break;
		case 2:
			?>
			<script>$.notify("Your account has been disconnected with success",{className:"success",position:"top center"});</script>
			<?php
			break;
		case 3:
			?>
			<script>$.notify("Error: Wrong login or password",{className:"error",position:"top center"});</script>
			<?php
			break;
		case 4:
			?>
			<script>$.notify("Warning: You have to sign in",{className:"warn",position:"top center"});</script>
			<?php
			break;
		}