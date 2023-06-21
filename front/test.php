<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"><title>Title</title>

    <link rel="stylesheet" href="css/spectre.min.css">
    <link rel="stylesheet" href="css/spectre-exp.min.css">
    <link rel="stylesheet" href="css/spectre-icons.min.css">
</head>
<body>

<?php
// Include the PHP class file
require_once './models/Action.php';

// Access the array property in your class
$items = Action::getAllActions();

?>

<h1>Actions</h1>

<table class="table table-striped table-hover">
    <thead>
    <tr>
        <td>N°</td>
        <td>Cours</td>
        <td>Date</td>
        <td>Ouverture</td>
        <td>Cloture</td>
        <td>Cours_haut</td>
        <td>Cours_bas</td>
        <td>Volume</td>
        <td>idEntreprise</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($items as $key=>$actions): ?>
        <tr>
            <td><?= $key; ?></td>
            <td><?= $actions->getFlow(); ?></td>
            <td><?= $actions->getDate(); ?></td>
            <td><?= $actions->getOpening(); ?></td>
            <td><?= $actions->getClosing(); ?></td>
            <td><?= $actions->getHighFlow(); ?></td>
            <td><?= $actions->getLowFlow(); ?></td>
            <td><?= $actions->getVolume(); ?></td>
            <td><?= $actions->getIdCompany(); ?></td>
        </tr>
    <?php endforeach; ?>
    <tr class="active">

    </tr>
    </tbody>
</table>
</body>
</html>
