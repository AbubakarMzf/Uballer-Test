<?php require_once 'view_begin.php' ?>

<h1>BIENVENUE <?= e($infos['fname']) ?></h1>

<a href="/?controller=login&action=deco">Déconnexion</a>

<?php require_once 'view_end.php' ?>