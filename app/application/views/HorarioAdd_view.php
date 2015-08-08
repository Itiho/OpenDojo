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
    echo form_open('Horario/add', $attributes_form);

    if (form_error('Turma_idTurma')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Turma', 'Turma_idTurma', $attributes_label);
    if (isset($horario['Turma_idTurma'])) {
        $selected = $horario['Turma_idTurma'];
    } else {
        $selected = '';
    }
?>
<div class="col-xs-4">
    <?php echo form_dropdown('Turma_idTurma', $turmas, $selected, $attributes_dropdown); ?>
</div>
<?php echo form_error('Turma_idTurma'); ?>
</div>

<?php
    if (form_error('diaSemana')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Dia da semana', 'diaSemana', $attributes_label);
    if (isset($horario['diaSemana'])) {
        $selected = $horario['diaSemana'];
    } else {
        $selected = '';
    }
?>
<div class="col-xs-4">
    <?php echo form_dropdown('diaSemana', $diasSemana, $selected, $attributes_dropdown); ?>
</div>
<?php echo form_error('diaSemana'); ?>
</div>    
    
    
<?php      
    if (form_error('horaInicio')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Início', 'horaInicio', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'horaInicio';
        $attributes_text['id'] = 'horaInicio';
        $attributes_text['style'] = 'width:70px';
        if (isset($horario['horaInicio'])) {
            $attributes_text['value'] = $horario['horaInicio'];
        }

        echo form_input($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('horaInicio');
    ?>
</div>
<?php      
    if (form_error('horaFim')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Término', 'horaFim', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'horaFim';
        $attributes_text['id'] = 'horaFim';
        if (isset($horario['horaFim'])) {
            $attributes_text['value'] = $horario['horaFim'];
        }

        echo form_input($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('horaFim');
    ?>
</div>

</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php
        echo form_submit($attributes_submit, 'Salvar');

        $options = 'onClick="window.location=\'' . site_url('Horario') . '\'" class="btn"';
        echo form_button('cancel', 'Cancelar', $options);
        ?>
    </div>
</div>


<?php
echo form_close();
?>
</div>


<script type="text/javascript">
   jQuery(function($){
   $("#horaFim").mask("99:99",{autoclear: false});
   $("#horaInicio").mask("99:99",{autoclear: false});
});
</script>


<?php
$this->view('Footer_view');
?>
