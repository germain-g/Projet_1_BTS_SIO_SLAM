<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_connexion.css" />
        <title>Se connecter</title>
    </head>

    <body>

       <div id="bloc_entete">       
          <?php 
               include("entete.php"); /* Insérer la page d'entête ! */
          ?>
       </div> 

              <div id="bloc_page_c">
                    <div id="titre_1C">
                         <h2>Connectez-vous</h2>
                    </div>

                    <form method="post" action="connexion.php"> <!-- Le formulaire est envoyé sur cette même page !-->
                        
                        <div id="conteneur_1C">
                            <div class="bloc_c">
                                <input type="email" name="mail_connexion" id="mail_utilisateur" placeholder="E-mail" />
                            </div>
                        
                            <div class="bloc_c">
                                <input type="password" name="password_connexion" id="password_utilisateur" placeholder="Mot de passe" /> 
                            </div>
                        </div> <!-- conteneur_1C --> 

                        <div id="infos_compte">
                            <p><a href="#">informations de compte oubliées ?</a></p> <!-- Lien vers une autre page -->
                        </div> 
                       
                        <div id="bloc_connexion" >
                            <input type="submit" value="Se connecter" id="boutton_connexion"/>  
                        </div>      
                    </form>

                  <div id="aides">
                        <p>Vous n'avez pas de compte ?</p>
                  </div>

                  <div id="inscription_c">
                        <a href="inscription.php" id="boutton_inscription_c">S'inscrire</a> 
                  </div>

      <div id="connexion_bdd">
        <?php 
           if (isset($_POST['mail_connexion']) AND isset($_POST['password_connexion'])) /* Ce "if" Pour qu'a la première ouverture de la page "connexion.php" le serveur ne considère pas comme érreur des éléments de la page "connexion_bdd.php" et ne les affiches ! */
           {
             include("connexion_bdd.php"); /* Insérer la page PHP qui permet la connexion à la base de données et traiter les infos du formulaire ! */
           }
        ?>
      </div>
                 
              </div> <!-- bloc_page_c -->
              
    </body>
</html>