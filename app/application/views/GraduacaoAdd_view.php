
<div class="container-fluid">
    <h1><i class="fa fa-pencil  fa-3x"></i> <?=$cabecalho ?></h1>

<?php
    $attributes_form = array('class' => 'form-horizontal');
    $attributes_label = array('class' => 'col-sm-2 control-label');
    $attributes_text = array('class' => 'form-control');
    $attributes_dropdown = 'class="form-control"';
    $attributes_submit = array('class' => 'btn btn-default');
    
    echo form_open('graduacao/save',$attributes_form);
    //echo form_hidden('idGraduacao',$graduacao['idGraduacao']);
            
?>
<div class="form-group">
<?php

    echo form_label('Graduação', 'nomeGraduacao', $attributes_label);
?>
    <div class="col-sm-10">
<?php
    //atributos extra do campo texto
    $attributes_text['name'] = 'nomeGraduacao';
    $attributes_text['id']  = 'nomeGraduacao';
    //$attributes_text['value'] = $graduacao['nomeGraduacao'];
    
    echo form_input($attributes_text);
?>
</div>
</div>
 <div class="form-group">
<?php

    echo form_label('Arte Marcial', 'arteMarcial', $attributes_label);
?>
    <div class="col-sm-10">
<?php   
    
$options = array();
foreach ($artesMarciais as $arteMarcial){
    $options[$arteMarcial['idArteMarcial']] = $arteMarcial['nomeArteMarcial'];
}

echo form_dropdown('arteMarcial', $options, '', $attributes_dropdown);
    
?>
</div>
</div>
 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
<?php
    echo form_submit($attributes_submit, 'Salvar'); 
            
    $options = 'onClick="window.location=\''.site_url('graduacao').'\'" class="btn" id="arteMarcial"';
    echo form_button('cancel', 'Cancelar', $options); 
?>
    </div>
  </div>


<?php 
    echo form_close(); 
?>


</div>
