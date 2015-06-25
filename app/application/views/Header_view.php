<?php
echo doctype('xhtml11');
?>

<html>
    <head>
        <title><?= $titulo ?> - <?= $cabecalho ?></title>

        <!--CSS
        ==========================================================-->
        <!--
        Foi substituido pelo CDN
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
        -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="<?php echo base_url(); ?>assets/css/opendojo.min.css" rel="stylesheet">

        <!--JavaScript
        ==========================================================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!--
        Foi substituido pelo CDN
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 
        -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-confirmation.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/opendojo.js"></script>

    </head>
    <body>

        <?php
        $this->view('Navbar_view');
        ?>
    

