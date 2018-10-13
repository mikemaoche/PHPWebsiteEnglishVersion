/* SCRIPT CRÉATION DE TOUTES BALISES DU SITE */
/*** crée le : 27/02/2016 ***/

function creerMenuPrincipal()
{
	var balise = '<ul><li><p>Menu</p> <img src="./images/home.png" alt="home" /></li>'
	var dictionnaire = {
		"Home":'index.php',
		"Request your video":'demande.php',
		"Watching":'visionnage.php',
		"Sign in":'login.php',
		"Subscribe":'inscription.php',
		"Contact":'contact.php'
	}

	for (var key  in dictionnaire)
	{
		balise += "<li><a href="+ dictionnaire[key] +">"+ key +"</a></li>"
	}
	document.write(balise + "</ul>")
	
}


function creerButtonsLogIns()
{
	document.write('<button id="idBtnLog" type="button"><a href="login.php">Log in</a></button>')
    document.write('<button id="idBtnInscription" type="button"><a href="inscription.php">Sign up</a></button>')
}



