<?php
	
	require_once("partial/header.php");
	if(!empty($_SESSION["visibility"]) < 2)
	{
		header("location:login.php?error=1");
	}
	require_once("action/actionSessionAdmin.php");
	require_once("action/actionManipulerFichier.php");
	require_once("action/actionVisionnage.php");
	# instancier
	$admin = new SessionAdmin(new Database);
	$file = new File("announce.txt");
	$video = new Video(new Database);

	# operations
	# supprimer un usager
	$userASupp = !empty($_POST["listUsager"]) ? $_POST["listUsager"] : '';
	$reponse = $admin->supprimerUsager($userASupp);
	# supprimer une video
	$videoASupp = !empty($_POST["listVideo"]) ? $_POST["listVideo"] : '';
	$reponse = $admin->supprimerVideo($videoASupp);
	# écrire une annonce
	if(!empty($_GET["editor1"])){
		$file->ecrireAnnonce($_GET["editor1"]);
	}
	# ajouter une video
	$titre = !empty($_GET["titre"]) ? $_GET["titre"] : '';
	$url = !empty($_GET["url"]) ? $_GET["url"] : '';
	$reponse =  $video->ajouterVideo($titre,$url);
	if($reponse == "success"){
		header("location:session-admin.php");
	}

?>
	<div class="container">
		<!-- CHANGER SA PHOTO PROFIL -->
		<div class="editerProfil">
			<?php require_once("partial/upload-image.php");  ?>
		</div>

		<!-- CHANGER LES INFOS DU PROFIL -->
		<div class="editerProfil">
			<div class="divDroite">
				<div class="divDroiteSous">
					<p>Username</p><input id="idNom" type="text" name="nom" placeholder=<?=$_SESSION['login']?> disabled />
					<p>Email</p><input id="idEmail" type="text" name="email" placeholder=<?='"' . $_SESSION['email'] . '"'?> disabled />
					<button onclick="editerProfil()">Edit</button>
				</div>				
			</div>
		</div>

		<!-- SUPPRESSION D'UN USAGER OU D'UNE VIDEO -->
		<div class="adminFonction">
			<h2>Delete users</h2>
			<form method="POST">
			  <select name="listUsager" size="5">
			  	<?php
			  		$list = $admin->afficher('usagers');
			  		$compteur = 0;
			  		foreach($list as $key => $item)
					{ 
						if($item["statut"] == "usager"){
							if($compteur == 0){
						?>
 							<option value=<?=$item["nom"]?> selected="selected"><?=$item["nom"]?></option>
 						<?php
 							}else{
 							?>
 							<option value=<?=$item["nom"]?>><?=$item["nom"]?></option>
 							<?php 
 							}
 						}
 						$compteur++;
					}
			  	?>
			  </select>
			  <input name="supprimerUsager" type="submit" value="delete">
			</form>
			<h2>Delete Videos Posted</h2>
			<form method="POST">
			  <select name="listVideo" size="5">
			  	<?php
			  		$list = $admin->afficher('videos');
			  		$compteur = 0;
			  		foreach($list as $id => $item)
					{ 
						if($compteur == 0){
						?>
 							<option selected="selected" value=<?='"'. $item["titre"] . '"'?>><?=$item["titre"]?></option>
 					<?php
 						}else{
 						?>
 							<option value=<?= '"'. $item["titre"] . '"' ?>><?=$item["titre"]?></option>
 						<?php
 						}
					}
					$compteur++;
			  	?>			 
			  </select>
			  <input name="supprimerVideo" type="submit" value="delete">
			</form>
		</div>

		<!-- PUBLICATION DES ANNONCES -->
		<div id="monEditeur" class="adminFonction">
			<h2>Publish An Announce</h2>
			<form method="GET">
	           <textarea class="ckeditor" name="editor1" id="editor1" rows="10" cols="80">
	           </textarea>
	           <input type="submit" value="save" />
       		</form>
		</div>

		<!-- AJOUTER DES VIDEOS -->
		<div id="ajouterVideo" class="adminFonction">
			<h2>Upload A New Video</h2>
			<form method="GET">
				<input id="titre" type="text" name="titre" placeholder="Title of the video" />
				<input id="url" type="text" name="url" placeholder="Url" />
				<input type="submit" value="add" />
			</form>
		</div>

		<!-- LISTES DES USAGERS SIGNALES -->
		<div class="adminFonction">
			<h2>List Of Users Reported</h2>
		</div>
	</div>
	<script src="ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace( 'editor1' );</script>
<?php
	require_once("partial/footer.php");
?>