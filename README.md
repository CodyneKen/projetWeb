projet_web

Auteur : c'est macouille

BONNES RESSOURCES :<br> https://product.hubspot.com/blog/git-and-github-tutorial-for-beginners <br>
                    https://www.atlassian.com/fr/git/tutorials/syncing/git-push

Initialisation:
Installer github cli https://github.com/cli/cli

aller sur https://github.com/CodyneKen/projetWeb

Sur pc:
aller dans le dossier on on veut mettre le repo (la ou tu mes tout tes dossies github)

            >gh repo clone CodyneKen/projetWeb
UTILE : ca met un dossier deja existant sur ton pc, après c'est bonnard.
        pour mettre un dossier sur github c'est vachement plus compliqué, me demander
        
(la normalement ca installe et ca fait tout)

\<FACULTATIF\>

A partir de maintenant, tu as la branche main du projet sur ton ordi

            >cd projetWeb
            >git branch      (pour voir sur quelle branche on est)
(affichage) >* main          (normalement)

UTILE : git branch est pratique, ca permet de se reperer 

Maintenant, pour commencer a bosser :
  
            >git checkout -b <pelo_qui_bosse>-<fichier_edité>-<date?>
            ex : >git checkout -b coco-projet_acceuil-0104
            c'est une idée, jsp comment on va faire en pratique, mais c'est important de distinguer les branches, a qui elles appartiennent, qui les modifie, etc
            
UTILE : git checkout -b <nom_de_branch> va creer une branch a partir de la branch actuelle, et nous placer dedans. A partir de la on peut bosser, modifier les fichiers, et tt. IMPORTANT : avoir fais git branch avant pour savoir ds quelle branche on est, psq la branche se fais pas forcement depuis main

\</FACULTATIF\>

POUR BOSSER
  
            >git status : permet  de voir quels fichiers on étés modifiés, lesquels sont trackés
            
            >git add <nom_fichier> : ajoute des fichiers au trackage(suivi des modifs de fichiers), je fais tout le temps git add . ou git add *, ca ajoute tout les fichiers, balek
            
            >git commit -m "message du commit" : fixe les changements effectués au fichiers a la branche actuelle
            
            >git push -u origin coco-php (coco-php = le nom de la branche que tu veut fusionner, ca sera souvent main pour nous)
a partir de la, tout le code qu'on as ecrit est sur github.com, et il faut qu'on fasse les merge manuellement ensemble
(EVITER DE MODIFIER LES MEME FICHIERS SEPAREMENT, ca devient vite chiant)
 
