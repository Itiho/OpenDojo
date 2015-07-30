<?php
    $this->view('Header_view');
        
    //Declarações de tipo para formulário
    $attributes_form = array('class' => 'form-horizontal');
    $attributes_label = array('class' => 'col-sm-2 control-label');
    $attributes_text = array('class' => 'form-control');
    $attributes_dropdown = 'class="form-control"';
    $attributes_submit = array('class' => 'btn btn-default');
?>
<div class="container-fluid">
    <h1><i class="fa fa-pencil  fa-3x"></i> <?=$cabecalho ?></h1>

<?php
    echo form_open('Graduacao/edit/'.$graduacao['idGraduacao'],$attributes_form);
    echo form_hidden('idGraduacao',$graduacao['idGraduacao']);
            
    if(form_error('nomeGraduacao')){
        echo '<div class="form-group has-error">';
    } else{
        echo '<div class="form-group">';
    }

    echo form_label('Graduação', 'nomeGraduacao', $attributes_label);
?>
    <div class="col-xs-4">
<?php
    //atributos extra do campo texto
    $attributes_text['name'] = 'nomeGraduacao';
    $attributes_text['id']  = 'nomeGraduacao';
    if(isset($graduacao['nomeGraduacao'])){
        $attributes_text['value']  = $graduacao['nomeGraduacao'];
    }
    
    echo form_input($attributes_text);
?>
</div>
<?php
    echo form_error('nomeGraduacao');
?>
</div>
<?php
    if (form_error('ArteMarcial_idArte_Marcial')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

echo form_label('Arte marcial', 'ArteMarcial_idArte_Marcial', $attributes_label);
?>
    <div class="col-xs-4">
<?php   
    if (isset($graduacao['ArteMarcial_idArte_Marcial'])) {
        $selected = $graduacao['ArteMarcial_idArte_Marcial'];
    } else {
        $selected = '';
    }
echo form_dropdown('ArteMarcial_idArte_Marcial', $artesMarciais, $selected, $attributes_dropdown);
    
?>
</div>
<?php
    echo form_error('ArteMarcial_idArte_Marcial');
?>
</div>
 <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
<?php
    echo form_submit($attributes_submit, 'Salvar'); 
            
    $options = 'onClick="window.location=\''.site_url('Graduacao').'\'" class="btn"';
    echo form_button('cancel', 'Cancelar', $options); 
?>
    </div>
  </div>


<?php 
    echo form_close(); 
?>
</div>
<?php
	$this->view('Footer_view');
?>
