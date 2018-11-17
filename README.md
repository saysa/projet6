# Projet 6
Projet 6 complet de la formation PHP/Symfony d'OpenClassroom

# Installation
## 1. Récupération du projet
Récuperez ce projet et installez suivant le besoin, comme le répertoire www
de wamp.


## 2. Mettez à jour le fichier .env
Remplacer les valeurs de bases par ceux de votre accés à la bdd

## 3. La console cmd
Avec Composer installez les vendors avec la commande 
    
    composer require

## 4. Créez la base de données
Utilisez les commandes pour créer la bdd :

    php bin/console doctrine:database:create

Puis les migrations :

    php bin/console doctrine:migrations:migrate

Et les fixtures :

    php bin/console doctrine:fixtures:load


