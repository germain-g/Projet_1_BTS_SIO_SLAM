<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_inscription.css" /> <!-- Lien vers le fichier CSS-->
        <title>S'inscrire</title>
    </head>

    <body>
      <div id ="bloc_page_i">
           <div id="titre_1i">
                 <h2>Inscrivez-vous</h2>
           </div>

           <form method="post" action="inscription_bdd.php"> <!-- Changer nom fichier php ICI-->
                    
                <div id="conteneur_1i">
                    <div class="bloc_i">
                          <input type="text" name="prenom_inscription" id="prenom_utilisateur" placeholder="Prénom(s)" />
                    </div>

                    <div class="bloc_i">
                          <input type="text" name="nom_inscription" id="nom_utilisateur" placeholder="Nom" />
                    </div> 
                        
                    <div class="bloc_i">
                          <input type="email" name="mail_inscription" id="mail_utilisateur" placeholder="E-mail" />
                    </div>

                    <div class="bloc_i">
                          <input type="password" name="password_inscription" id="password_utilisateur" placeholder="Mot de passe" />
                    </div>

                    <div class="bloc_i">
                          <input type="password" name="confirme_password" id="conf_password" placeholder="Confirmez votre mot de passe" />
                    </div>
                </div> <!-- conteneur_1i Fin-->

                    <div id="accepte_condition">
                          <input type="checkbox" name="conditions_generales" value="1" id="cond_gene" /> 
                          <label for="cond_gene">J'ai lu et j'accepte les <a href="#">conditions générales</a> </label> <!-- Lien vers une autre page -->
                    </div>

                    <div id="bloc_inscription" >
                          <input type="submit" value="S'inscrire" id="boutton_inscription"/>  
                    </div> 
            </form>

        <div id="aides">
              <p>Vous avez déjà un compte ?</p>
        </div>

        <div id="connexion_i">
              <a href="connexion.php" id="boutton_connexion_i">Se connecter</a> 
        </div>
                
      </div> 

    </body>
</html>