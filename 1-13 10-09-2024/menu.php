<?php
function menu($activePage) {
    $pages = [
        'formulario.php' => 'Cadastrar',
        'mostra.php' => 'Mostrar',
        'mostra_idade.php' => 'Idade',
        'sair.php' => 'Sair'
    ];
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">';
    echo '<a class="navbar-brand" href="#">Menu</a>';
    echo '<div class="collapse navbar-collapse">';
    echo '<ul class="navbar-nav">';
    foreach ($pages as $file => $title) {
        $active = ($file === $activePage) ? 'active' : '';
        echo "<li class='nav-item $active'><a class='nav-link' href='$file'>$title</a></li>";
    }
    echo '</ul>';
    echo '</div>';
    echo '</nav>';
}
?>
