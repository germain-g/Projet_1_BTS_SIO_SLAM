<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Se connecter</title>
        <link rel="stylesheet" href="connexion_bdd.css" /> <!-- Lien vers le fichier CSS-->
    </head>
    
    <body>

    <div id="bloc_page">  	
<?php

       try 
       {
				
			    $bdd = new PDO ('mysql:host=localhost;dbname=ppe_mycoloc', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
       } 
       catch (Exception $e) 
       {
			  	die('Erreur de base de données'.$e -> getMessage());
			 }

   $mail_c = htmlspecialchars($_POST['mail_connexion']); // Nommer les variables reçues du formulaire
   $password_c = htmlspecialchars($_POST['password_connexion']); // "htmlspecialchars" pour se protéger des failles XSS

//Pour vérifier qu'il y'a des valeurs entrées dans les champs de saisies
if ( !empty($_POST['mail_connexion']) AND !empty($_POST['password_connexion']) ) // "!empty" = champ remplie et "empty" = champ vide
{

$reponse = $bdd->query('SELECT mail, mot_de_passe FROM mycoloc_bdd'); // Sélectionner 2 tables de la base de données


  while($donnees = $reponse->fetch()) // Tant qu'il y'a une valeur dans les champs de la base de données
  {
    if($mail_c == $donnees['mail']  AND $password_c == $donnees['mot_de_passe'])
    {
      header('Location: utilisateur.php');  //Ensuite rediriger le visiteur vers sa page !
    }
    elseif ($mail_c != $donnees['mail']  AND $password_c == $donnees['mot_de_passe']) 
    {
      echo "<strong>Adresse E-mail incorrecte, réessayer<br/></strong>";
      break; // Pour qu'après l'affichage de l'érreur, la lecture du code s'arrête
    }
    elseif ($mail_c == $donnees['mail']  AND $password_c != $donnees['mot_de_passe']) 
    {
      echo "<strong>Mot de passe incorrecte, réessayer<br/></strong>";
      break; // Pour qu'après l'affichage de l'érreur, la lecture du code s'arrête  
    }
    elseif ($mail_c != $donnees['mail']  AND $password_c != $donnees['mot_de_passe']) 
    {
      echo "<strong>Adresse E-mail et Mot de passe incorrecte !<br/></strong>";
      break; // Pour qu'après l'affichage de l'érreur, la lecture du code s'arrête 
    }
    else
    {
      echo "<strong>Erreur, réessayer<br/></strong>";
    }
  }

$reponse->closeCursor(); //Fermer la requête sql

}

// Si il y'a un mail entrées dans les champs de saisies mais pas de mot de  passe entrées dans les champs de saisies
elseif ( !empty($_POST['mail_connexion']) AND empty($_POST['password_connexion']) )
{
  echo "<strong>Veuillez saisir un mot de passe !<br/></strong>";
}

// Si pas de mail entrées dans les champs de saisies mais le de mot de passe est remplie
elseif ( empty($_POST['mail_connexion']) AND !empty($_POST['password_connexion']) )
{
  echo "<strong>Veuillez saisir une adresse mail !<br/></strong>";
}

else // Si aucun champs n'est remplie
{
  echo "<strong>Veuillez remplir tous les champs !<br/></strong>";
}


?>
   </div>
   </body>
</html>