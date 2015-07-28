<?php
$this->view('Header_view');
$attributes_form = array('class' => 'form-inline');
$attributes_label = array('class' => 'sr-only');
$attributes_text = array('class' => 'form-control');
$attributes_dropdown = 'class="form-control"';
$attributes_submit = array('class' => 'btn btn-default');
?>
<div class="row">
    <div class="col-md-10"><h1><?= $cabecalho ?></h1></div>
    <div class="col-md-2"><?= anchor('Dojo/add', '<i class="fa fa-plus-circle fa-4x"></i><br />Adicionar') ?></div>
</div>

<?php
if ($this->session->flashdata('message') <> '' ) {
    if ($this->session->flashdata('type_message')) {
        echo '<div class="alert alert-success">';
    } else {
        echo '<div class="alert alert-danger">';
    }
    echo $this->session->flashdata('message');
    echo '</div>';
}
?>
<div class="row">
    <div class="col-md-10">
<div class="bs-filter">
    <?php
    echo form_open('Dojo', $attributes_form);
    ?>
    <div class="form-group">
        <?php
        echo form_error('filtro_nomeDojo');
        echo form_label('Dojo', 'filtro_nomeDojo', $attributes_label);
        ?>
        
        <?php
        $attributes_text['name'] = 'filtro_nomeDojo';
        $attributes_text['placeholder'] = 'Dojo';
        $attributes_text['id'] = 'filtro_nomeDojo';
        $attributes_text['value'] = $filtro_nomeDojo;

        echo form_input($attributes_text);
        ?>    
        </div>
    <div class="form-group">
        <?php
        echo form_error('filtro_arteMarcial');
        echo form_label('Arte Marcial', 'filtro_arteMarcial', $attributes_label);
        ?>
        <?php echo form_dropdown('filtro_arteMarcial', $artesMarciais, $filtro_arteMarcial, $attributes_dropdown); ?>
    </div>
    <div class="form-group">
        <?php
        echo form_error('filtro_academia');
        echo form_label('Academia', 'filtro_academia', $attributes_label);
        ?>
        <?php echo form_dropdown('filtro_academia', $academias, $filtro_academia, $attributes_dropdown); ?>
    </div>
    <?php
    echo form_submit($attributes_submit, 'Filtrar');
    $attributes_button = array(
    'class' => 'btn btn-default',
    'onClick' => "location= 'Dojo'",
    'value' => 'true',
    'type' => 'reset',
);
    echo form_button($attributes_button, 'Limpar');
    echo form_close();

    ?>
</div>
    </div>

    <div class="col-md-5">
        <ul class="pagination">
            <?= $all_pages ?>
        </ul>
    </div>
</div>  
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                ID
            </th>
             <th>
                Dojo
            </th>
            <th>
                Arte Marcial
            </th>
             <th>
                Academia
            </th>
            <th>
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($dojos != false): ?>
            <?php foreach ($dojos as $dojo): ?>
                <tr>
                    <td>
                        <?= $dojo->idDojo ?>
                    </td>
                    <td>
                        <?= $dojo->nomeDojo ?>
                    </td>
                    <td>
                        <?= $dojo->artemarcial->nomeArteMarcial ?>
                    </td>
                    <td>
                        <?= $dojo->academia->nomeAcademia ?>
                    </td>
                    <td style="text-align: center;">
                        <a class="btn btn-success" href="<?= site_url('Dojo/edit/' . $dojo->idDojo) ?>">
                            <i class="fa fa-pencil fa-lg"></i> Editar</a>
                        <?php if(!isset($dojo->turmas)) { ?>
                        <a class="btn btn-danger" href="<?= site_url('Dojo/delete/' . $dojo->idDojo) ?>"
                           title="Deseja realmente excluir a graduação?" data-toggle="confirmation-delete" data-singleton="true" data-placement="top">
                            <i class="fa fa-trash-o fa-lg" title="Excluir a Graduação"></i> Deletar</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
        <p>Não há registros cadastrados!</p>
    <?php endif ?>
</tbody>
</table>



</div>

<?php
$this->view('Footer_view');
?>
