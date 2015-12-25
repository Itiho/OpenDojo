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
    echo form_open('Usuario/edit', $attributes_form);
    echo form_hidden('idUsuario', $usuario['idUsuario']);

    if (form_error('nomeUsuario')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Nome completo', 'nomeUsuario', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'nomeUsuario';
        $attributes_text['id'] = 'nomeUsuario';
        if (isset($usuario['nomeUsuario'])) {
            $attributes_text['value'] = $usuario['nomeUsuario'];
        }

        echo form_input($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('nomeUsuario');
    ?>
</div>
<?php
    if (form_error('login')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Login', 'login', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'login';
        $attributes_text['id'] = 'login';
        if (isset($usuario['login'])) {
            $attributes_text['value'] = $usuario['login'];
        }

        echo form_input($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('login');
    ?>
</div>
<?php
    if (form_error('password')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Senha', 'password', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'password';
        $attributes_text['id'] = 'password';
        $attributes_text['value'] = '';

        echo form_password($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('password');
    ?>
</div>
<?php
    if (form_error('password')) {
        echo '<div class="form-group has-error">';
    } else {
        echo '<div class="form-group">';
    }

    echo form_label('Confirmação da senha', 'passwordConfirm', $attributes_label);
    ?>
    <div class="col-xs-4">
        <?php
        //atributos extra do campo texto
        $attributes_text['name'] = 'passwordConfirm';
        $attributes_text['id'] = 'passwordConfirm';

        echo form_password($attributes_text);
        ?>
    </div>
    <?php
    echo form_error('passwordConfirm');
    ?>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
<?php
echo form_submit($attributes_submit, 'Salvar');

$options = 'onClick="window.location=\'' . site_url('Usuario') . '\'" class="btn"';
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
