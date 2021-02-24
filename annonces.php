<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_annonces.css" /> <!-- Lien vers le fichier CSS-->
        <title>Colocations à Paris et dans toute l'Île-de-France | MyColoc</title>
    </head>

    <body>
         <div id="bloc_page_an">
              <div id="titre_1an">
                   <h2>Saisissez vôtre annonce :</h2>
              </div>

              <form method="post" action="annonces.php">
                  
                  <div id="conteneur_1an">
                      <div class="bloc_1">
                          <label for="option_annonce">Vôtre option:</label><br/>
                          <input type="text" name="option" id="option_annonce" placeholder="Ex: Je cherche une chambre ou Je propose un logement " maxlength="30" />
                      </div>
                  
                      <div class="bloc_1">
                          <label for="prenom_an">Prénom(s):</label><br/>
                          <input type="text" name="prenom_annonce" id="prenom_an" placeholder="Prénom(s)" /> 
                      </div>
                  </div> <!-- conteneur_1an--> 

                  <div id="bloc_2">
                          <label for="saisie_annonce">Vôtre annonce:</label><br/>
                          <textarea name="annonce" id="saisie_annonce">Dans vôtre annonce, indiquer en quelques lignes le lieu du logement(Ex: Paris), vôtre Budget maximum, vôtre âge, ce que vous faites dans la vie et vos disponibilités pour la colocation.</textarea>
                  </div>
                 
                  <div id="bloc_3" >
                      <input type="submit" value="Déposer l'annonce" id="boutton_an"/>  
                  </div>      
              </form>
              
         </div>

<!-- Code PHP !!!  -->
  <?php 

       if ( isset($_POST['option']) AND isset($_POST['prenom_annonce']) AND isset($_POST['annonce']) ) //Ce "if" Pour qu'a la première ouverture de la page "annonces.php" le serveur ne considère pas comme érreur des éléments de la page "annonces_bdd.php" et ne les affiches !
       {
           include("annonces_bdd.php"); // Insérer la page PHP qui permet l'enregistrement de l'annonce dans la base de données !
       }

  ?>
    </body>
</html>