<?php
/**
 * Affichage d'une vue
 * @param string $title titre de la page
 * @param string $view nom du ficher vue sans l'extension .php
 * @param array $data tableau associatif des données à passer à la vue
 * @throws Exception
 */
function renderView($title, $view, $data = array()) {
    $viewFile = '../views/' . $view . '.php';
    if (file_exists($viewFile)) {
        extract($data);
        ob_start();
        require($viewFile);
        $title = $title . ' - Bloug';
        $content = ob_get_clean();
        require('../views/base.php');
    } else {
        throw new Exception('View ' . $view . ' not found!');
    }
}