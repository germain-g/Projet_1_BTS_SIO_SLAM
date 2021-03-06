<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>S'inscrire</title>
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


   $prenom_i = htmlspecialchars($_POST['prenom_inscription']); // Nommer les variables reçues du formulaire
   $nom_i = htmlspecialchars($_POST['nom_inscription']); 
   $mail_i = htmlspecialchars($_POST['mail_inscription']); 
   $password_i = htmlspecialchars($_POST['password_inscription']); // "htmlspecialchars" pour se protéger des failles XSS
   $conf_pass = htmlspecialchars($_POST['confirme_password']); // Pour vérifier le mot de passe choisie
   // $conditions_gene = htmlspecialchars($_POST['conditions_generales']);


//Pour vérifier qu'il y'a des valeurs entrées dans les champs de saisies
if ( !empty($_POST['prenom_inscription']) AND !empty($_POST['nom_inscription']) AND !empty($_POST['mail_inscription']) AND !empty($_POST['password_inscription']) AND !empty($_POST['confirme_password']) ) // "!empty" = champ remplie et "empty" = champ vide
{

  if(strlen($_POST['password_inscription']) >= 4) // Si le mot de passe contient au moins 4 caractère
  {

    if($_POST['password_inscription'] == $_POST['confirme_password']) // Si les mots de passe sont identiques
    {


        if(!empty($_POST['conditions_generales'])) // Si le boutton d'accepter les conditions est coché
        {

                  $requete = $bdd->prepare('INSERT INTO mycoloc_bdd(prenom, nom, mail, mot_de_passe) VALUES (:prenom_i, :nom_i, :mail_i, :password_i)') or die(print_r($bdd->errorInfo()));

                  $requete->execute(array( 
                                           'prenom_i' => $prenom_i, 
                                            'nom_i' => $nom_i,
                                            'mail_i' => $mail_i,
                                            'password_i' => $password_i
                                          ));

                  header('Location: utilisateur_i.php');  //Ensuite rediriger le visiteur vers une page d'inscription de base !

                  $requete->closeCursor(); // Fermer la requête sql
  
        }
        else
        {
           echo "Valider les conditions générales !";
        }
    }
    else
    {
       echo "Les mots de passe ne sont pas identiques !";
    }
  }
  else
  {
    echo "Mot de passe trop court, doit contenir au moins 4 caractères !";
  }

}

// Si le Prénom n'est pas saisie mais tous le reste oui
elseif ( empty($_POST['prenom_inscription']) AND !empty($_POST['nom_inscription']) AND !empty($_POST['mail_inscription']) AND !empty($_POST['password_inscription']) AND !empty($_POST['confirme_password']) )
{
  echo "Veuillez saisir un prénom !";
}

// Si le Nom n'est pas saisie mais tous le reste oui
elseif ( !empty($_POST['prenom_inscription']) AND empty($_POST['nom_inscription']) AND !empty($_POST['mail_inscription']) AND !empty($_POST['password_inscription']) AND !empty($_POST['confirme_password']) )
{
  echo "Veuillez saisir un Nom !";
}

// Si l'adresse mail n'est pas saisie mais tous le reste oui
elseif ( !empty($_POST['prenom_inscription']) AND !empty($_POST['nom_inscription']) AND empty($_POST['mail_inscription']) AND !empty($_POST['password_inscription']) AND !empty($_POST['confirme_password']) )
{
  echo "Veuillez saisir une adresse E-mail !";
}

// Si le mot de passe n'est pas saisie mais tous le reste oui
elseif ( !empty($_POST['prenom_inscription']) AND !empty($_POST['nom_inscription']) AND !empty($_POST['mail_inscription']) AND empty($_POST['password_inscription']) AND !empty($_POST['confirme_password']) )
{
  echo "Veuillez saisir un mot de passe !";
}

// Si la confirmation du mot de passe n'est pas saisie mais tous le reste oui
elseif ( !empty($_POST['prenom_inscription']) AND !empty($_POST['nom_inscription']) AND !empty($_POST['mail_inscription']) AND !empty($_POST['password_inscription']) AND empty($_POST['confirme_password']) )
{
  echo "Confirmer le mot de passe !";
}

else // Si il manque des paramètres, on avertit le visiteur
{
  echo "Il faut renseigner tous les champs !";
}


?>
  
   </div>
   </body>
</html>