<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png')?>">

    <meta name="description" content=""/>
    <meta name="keywords" content="bootstrap, bootstrap4"/>

    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/tiny-slider.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <title><?= $title ?? 'Home' ?> </title>
</head>
    <body>

    <?= $this->include('layout/header') ?>      

    <?= $this->renderSection('content') ?>

    <?= $this->include('layout/footer') ?>      

    </body>
</html>
