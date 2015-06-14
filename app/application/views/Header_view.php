<?php 
    echo doctype('xhtml11');
    
    //Declarações de tipo para formulário
    $attributes_form = array('class' => 'form-horizontal');
    $attributes_label = array('class' => 'col-sm-2 control-label');
    $attributes_text = array('class' => 'form-control');
    $attributes_dropdown = 'class="form-control"';
?>



<html>
<head>
	<title><?=$titulo ?> - <?=$cabecalho ?></title>





<!--CSS
==========================================================-->
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
 
<!--JavaScript
==========================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>


</head>
<body>
    

