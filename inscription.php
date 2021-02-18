<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription Page 1</title>
    </head>
    
    <body>  	
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
  
   /* 

   $conf_pass = htmlspecialchars($_POST['confirme_password']); //Faire les modifications pr valider conditions générales et la confirmation du mot depasse
   $conditions_gene = htmlspecialchars($_POST['conditions_generales']); 

   */

//Pour vérifier qu'il y'a des valeurs entrées dans les champs de saisies
if (isset($_POST['prenom_inscription']) AND isset($_POST['nom_inscription']) AND isset($_POST['mail_inscription']) AND isset($_POST['password_inscription']))
{

$requete = $bdd->prepare('INSERT INTO mycoloc_bdd(prenom, nom, mail, mot_de_passe) VALUES (:prenom_i, :nom_i, :mail_i, :password_i)') or die(print_r($bdd->errorInfo()));

$requete->execute(array( 
                           'prenom_i' => $prenom_i, 
                           'nom_i' => $nom_i,
                           'mail_i' => $mail_i,
                           'password_i' => $password_i
                        ));

 echo "<p><strong>Nom: </strong>" . $nom_i . "<br/>Prénom: " . $prenom_i . "<br/>Mot de passe: " . $password_i . "<br/>Mail: " . $mail_i  . "</p>";


}
else // Si il manque des paramètres, on avertit le visiteur
{
  echo "Il faut renseigner tous les champs !";
}

$requete->closeCursor();


?>

   </body>
</html>