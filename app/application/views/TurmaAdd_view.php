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
    echo form_open('Turma/add', $attributes_form);

    if (form_error('nomeTurma')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Turma', 'nomeTurma', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'nomeTurma';
        $attributes_text['id'] = 'nomeTurma';
        if (isset($turma['nomeTurma'])) {
            $attributes_text['value'] = $turma['nomeTurma'];
        }

        echo form_input($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('nomeTurma');
    ?>
</div>
<?php
    if (form_error('Dojo_idDojo')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Dojo', 'Dojo_idDojo', $attributes_label);
    if (isset($turma['Dojo_idDojo'])) {
        $selected = $turma['Dojo_idDojo'];
    } else {
        $selected = '';
    }
?>
<div class="col-xs-4">
    <?php echo form_dropdown('Dojo_idDojo', $dojos, $selected, $attributes_dropdown); ?>
</div>
<?php echo form_error('Dojo_idDojo'); ?>
</div>

<?php
    if (form_error('ativo')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Ativo', 'ativo', $attributes_label);
    if (isset($turma['ativo'])) {
        $selected = $turma['ativo'];
    } else {
        $selected = '';
    }
?>
<div class="col-xs-4">
    <?php echo form_dropdown('ativo', $options_active, $selected, $attributes_dropdown); ?>
</div>
<?php echo form_error('ativo'); ?>
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
