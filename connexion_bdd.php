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


if ( isset($_POST['mail_connexion']) AND isset($_POST['password_connexion']) ) //Pour vérifier qu'il y'a des valeurs entrées dans les champs de saisies
{

$reponse = $bdd->query('SELECT mail, mot_de_passe FROM mycoloc_bdd');


  while($donnees = $reponse->fetch()) // Tant qu'il y'a une valeur dans les champs de la base de donnée
  {
    if($mail_c == $donnees['mail']  AND $password_c == $donnees['mot_de_passe'])
    {
      header('Location: utilisateur_1.php');  //Ensuite rediriger le visiteur vers sa page !
    }
    elseif ($mail_c != $donnees['mail']  AND $password_c == $donnees['mot_de_passe']) 
    {
      echo "<strong>Adresse e-mail incorrecte, réessayer<br/></strong>";

    }
    elseif ($mail_c == $donnees['mail']  AND $password_c != $donnees['mot_de_passe']) 
    {
      echo "<strong>Mot de passe incorrecte, réessayer<br/></strong>";
      
    }
    elseif ($mail_c != $donnees['mail']  AND $password_c != $donnees['mot_de_passe']) 
    {
      echo "<strong>il faut renseigner tous les champs !<br/></strong>";
      break;
    }
    else
    {
      echo "<strong>Erreur, réessayer<br/></strong>";
    }
  }

}

else // Si il manque des paramètres, ou qu'il y'a une quelconque érreur on avertit le visiteur
{
  echo "<strong>Veuillez remplir tous les champs !<br/></strong>";
}

$reponse->closeCursor(); //Fermer la requête sql

?>
   </div>
   </body>
</html>