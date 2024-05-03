<?php

// Define constant for the directory path
define('LANG_DIR', __DIR__ . '/../../');
$commonTranslations = include LANG_DIR . 'common_fr.php';

return [
    'projects' => 'Liste des projets',
    'task' => 'Les tâches',
    'addProjet' => 'Ajouter un projet',
    'editProjet' => 'Modifier le Projet',
    'project' => 'Projet',
    'date' => 'Date',
    'description' => 'Description',
    'startDate' => 'Date de début',
    'endDate' => 'Date de fin',
    'detail' => 'Detail de projet',
    'title' => 'Titre',
    'action' => 'Actions',
    'createProjectException' => 'Projet est déjà existant',
    'unexpected_error' => 'Une erreur inattendue s\'est produite. Veuillez réessayer.',
    'newProject' => 'Nouveau Projet',
    'addProject' => 'Ajouter un Projet',
    'projetAdded' => 'Le projet a été ajouté avec succès..',


] + $commonTranslations;