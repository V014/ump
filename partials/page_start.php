<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>
        <?= $pageTitle ?? "Universal Marketplace" ?>
    </title>
</head>
<?php
$diplay_background_image ??= false;
?>

<body class="<?= $displayBg ? 'home-page__bg-image' : '' ?>">