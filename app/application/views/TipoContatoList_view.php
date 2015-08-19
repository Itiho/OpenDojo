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
    <div class="col-md-2"><?= anchor('TipoContato/add', '<i class="fa fa-plus-circle fa-4x"></i><br />Adicionar') ?></div>
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
    <div class="col-md-7">
<div class="bs-filter">
    <?php
    echo form_open('TipoContato', $attributes_form);
    ?>
    <div class="form-group">
        <?php
        echo form_error('filtro_nomeTipoContato');
        echo form_label('Tipo de contato', 'filtro_nomeTipoContato', $attributes_label);
        ?>
        
        <?php
        $attributes_text['name'] = 'filtro_nomeTipoContato';
        $attributes_text['placeholder'] = 'Tipo de contato';
        $attributes_text['id'] = 'filtro_nomeTipoContato';
        $attributes_text['value'] = $filtro_nomeTipoContato;

        echo form_input($attributes_text);
        ?>    
        </div>
    

    <?php
    echo form_submit($attributes_submit, 'Filtrar');
    $attributes_button = array(
    'class' => 'btn btn-default',
    'onClick' => "location= 'TipoContato'",
    'value' => 'true',
    'type' => 'reset',
);
    echo form_button($attributes_button, 'Limpar');
    echo form_close();

    ?>
</div>
    </div>
<?php if ($tiposcontato != false): ?>
    <div class="col-md-5">
        <ul class="pagination">
            <?= $all_pages ?>
        </ul>
    </div>
    <?php endif ?>
</div>  
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Arte Marcial
            </th>
            <th>
                Opções
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($tiposcontato != false): ?>
            <?php foreach ($tiposcontato as $tipocontato): ?>
                <tr>
                    <td>
                        <?= $tipocontato->idTipoContato ?>
                    </td>
                    <td>
                        <?= $tipocontato->tipoContato ?>
                    </td>
                    <td style="text-align: center;">
                        <a class="btn btn-success" href="<?= site_url('TipoContato/edit/' . $tipocontato->idTipoContato) ?>">
                            <i class="fa fa-pencil fa-lg"></i> Editar</a>
                        <?php if(!isset($artemarcial->graduacoes) && !isset($artemarcial->dojos)) { ?>
                        <a class="btn btn-danger" href="<?= site_url('TipoContato/delete/' . $tipocontato->idTipoContato) ?>"
                           title="Deseja realmente deletar o tipo de contato?" data-toggle="confirmation-delete" data-singleton="true" data-placement="top">
                            <i class="fa fa-trash-o fa-lg" title="Deletar o tipo de contato"></i> Deletar</a>
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
