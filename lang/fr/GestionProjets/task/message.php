<?php

// Define constant for the directory path
define('LANG_DIR', __DIR__ . '/../../');
$commonTranslations = include LANG_DIR . 'common_fr.php';

return [
    'tasks' => 'Les tâches',
    'taskAdded' => 'Tâche ajoutée avec succès.',
    'choix' => 'Choisir un projet',
    'addTask' => 'Ajouter une tâche',
    'project' => 'Projet',
    'description' => 'Description',
    'startDate' => 'Date de début',
    'endDate' => 'Date de fin',
    'detail' => 'Detail de tâche',
    'newTask' => 'Nouveau Tâche',
    'member' => 'Member',
    'actions' => 'Actions',
    'editTask' => ' Modifier la Tâche',
    'choixUser' => 'choisissez un user',
    'createTaskException' => 'Tâche est deja existe',
    'unexpected_error' => 'Une erreur inattendue s\'est produite. Veuillez réessayer.'
] + $commonTranslations;