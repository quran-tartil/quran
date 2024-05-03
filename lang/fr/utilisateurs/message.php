<?php

// Define constant for the directory path
define('LANG_DIR', __DIR__ . '/../');
$commonTranslations = include LANG_DIR . 'common_fr.php';

return [
    'Users' => 'Utilisateurs',
    'users_list' => 'List des utlisateurs',
    'create_user' => 'Creé un utlisateur',
    'Search' => 'Rechercher',
    'if you are sure you want to delete this utilisateur' => 'si vous êtes sûr de vouloir supprimer cet utilisateur',
    'Click the Delete button to continue' => 'Cliquez sur le bouton Supprimer pour continuer',
    // create page
    'User Name' => 'Prénom',
    'User Lastname' => 'Nom',
    'Enter User Name' => 'saisir le prenom de utilisateur',
    'Enter User Lastname' => 'saisir le nom de utilisateur',
    'User Email' => 'Email de utilisateur',
    'Enter User Email' => 'saisir le Email de le utilisateur',
    'Password' => 'Mot de pass',
    'Enter User Password' => 'saisir le Mot de pass',
    'Confirm Password' => 'Confirmation de Mot de pass',
    'Export' => 'Exporter',
    'Import' => 'Importer',
    // update
    'old Password' => 'ancien mot de passe',
    'Enter User old Password' => 'Saisir l’ancien mot de passe de l’utilisateur',
    'User Details' => 'détails de le utilisateur',
    'Are you sure you want to delete this utilisateur?' => "Etes-vous sûr de vouloir supprimer cet utilisateur ?",
    'User Created Successfully' => 'Utilisateur ajouté avec succès',
    'A User with this Email already exist' => 'Un utilisateur avec cet email existe déjà',
    'An unexpected error has occurred.' => 'Une erreur est survenue.',
    'User Deleted Succesfully' => 'Utilisateur supprimé avec succès',
    'file imported succefully' => 'fichier importé avec succès',
    "there's no new data that being imported" => 'Pas de nouvelles données à importer.',
    'an error has been acourd check the syntax' => "une erreur a été acourd vérifier la syntaxe",

] + $commonTranslations;