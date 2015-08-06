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
    <h1><i class="fa fa-pencil  fa-3x"></i> <?= $cabecalho ?></h1>

    <?php
    echo form_open('Dojo/add', $attributes_form);

    if (form_error('nomeDojo')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Dojo', 'nomeDojo', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'nomeDojo';
        $attributes_text['id'] = 'nomeDojo';
        if (isset($dojo['nomeDojo'])) {
            $attributes_text['value'] = $dojo['nomeDojo'];
        }

        echo form_input($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('nomeDojo');
    ?>
</div>
<?php
    if (form_error('ArteMarcial_idArte_Marcial')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Arte Marcial', 'ArteMarcial_idArte_Marcial', $attributes_label);
    if (isset($dojo['ArteMarcial_idArte_Marcial'])) {
        $selected = $dojo['ArteMarcial_idArte_Marcial'];
    } else {
        $selected = '';
    }
?>
<div class="col-xs-4">
    <?php echo form_dropdown('ArteMarcial_idArte_Marcial', $artesMarciais, $selected, $attributes_dropdown); ?>
</div>
<?php echo form_error('ArteMarcial_idArte_Marcial'); ?>
</div>

<?php
    if (form_error('Academia_idAcademia')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Academia', 'Academia_idAcademia', $attributes_label);
    if (isset($dojo['Academia_idAcademia'])) {
        $selected = $dojo['Academia_idAcademia'];
    } else {
        $selected = '';
    }
?>
<div class="col-xs-4">
    <?php echo form_dropdown('Academia_idAcademia', $academias, $selected, $attributes_dropdown); ?>
</div>
<?php echo form_error('Academia_idAcademia'); ?>
</div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php
        echo form_submit($attributes_submit, 'Salvar');

        $options = 'onClick="window.location=\'' . site_url('ArteMarcial') . '\'" class="btn"';
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
