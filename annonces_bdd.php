<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Colocations à Paris et dans toute l'Île-de-France | MyColoc</title>
        <link rel="stylesheet" href="annonces_bdd.css" /> <!-- Lien vers le fichier CSS-->
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


   $option_an = htmlspecialchars($_POST['option']); // Nommer les variables reçues du formulaire
   $prenom_an = htmlspecialchars($_POST['prenom_annonce']); 
   $annonce_an = htmlspecialchars($_POST['annonce']); // "htmlspecialchars" pour se protéger des failles XSS


//Pour vérifier qu'il y'a des valeurs entrées dans les champs de saisies
if ( !empty($_POST['option']) AND !empty($_POST['prenom_annonce']) AND !empty($_POST['annonce']) ) // "!empty" = champ remplie et "empty" = champ vide
{

  $requete = $bdd->prepare('INSERT INTO mycoloc_bdd(option_annonceur, prenom, annonces) VALUES (:option_an, :prenom_an, :annonce_an)') or die(print_r($bdd->errorInfo()));

  $requete->execute(array( 
                              'option_an' => $option_an, 
                              'prenom_an' => $prenom_an,
                              'annonce_an' => $annonce_an
                          ));

  header('Location: page_accueil.php');  //Ensuite rediriger le visiteur vers la page d'accueil !

  $requete->closeCursor(); // Fermer la requête sql

}

// Si l'option n'est pas remplie mais tous le reste oui
elseif ( empty($_POST['option']) AND !empty($_POST['prenom_annonce']) AND !empty($_POST['annonce']) )
{
  echo "Veuillez saisir une option d'annonceur !";
}

// Si le Prénom n'est pas saisie mais tous le reste oui
elseif ( !empty($_POST['option']) AND empty($_POST['prenom_annonce']) AND !empty($_POST['annonce']) )
{
  echo "Veuillez saisir un prénom !";
}

// Si l'annonce n'est pas saisie mais tous le reste oui
elseif ( !empty($_POST['option']) AND !empty($_POST['prenom_annonce']) AND empty($_POST['annonce']))
{
  echo "Veuillez compléter vôtre annonce !";
}

else // Si il manque des paramètres, on avertit le visiteur
{
  echo "Il faut renseigner tous les champs !";
}

?>
  
   </div>
   </body>
</html>