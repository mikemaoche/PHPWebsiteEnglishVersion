<form action="#" method="post" enctype="multipart/form-data"><!--onSubmit="return validate()"-->
	<div class="divGauche">
		<div class="divGaucheSous">
			<img alt="Image path Invalid" src=<?php 
			$img = !empty($_SESSION["photoProfil"]) ? $_SESSION["photoProfil"] : "None";
			echo  $img ?> >
			<input type="file" name="file" id="idFile" style="display:none;"/>
			<input type="button" name="file" id="file" value="Upload Image Profile" onclick="getfile();"/>
			<input type="submit" name="submit" value="Save" />
		</div>
	</div>
</form>