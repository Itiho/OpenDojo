<?php
	$this->view('Header_view');
?>
<div class="row">
  <div class="col-md-10"><h1><?=$cabecalho ?></h1></div>
  <div class="col-md-2"><?=anchor('graduacao/add', '<i class="fa fa-plus-circle fa-4x"></i><br />Adicionar') ?></div>
</div>

<?php 
if (isset($message)) { 
    if($type_message){
        echo '<div class="alert alert-success">';
    } else {
        echo '<div class="alert alert-danger">';
    }
    echo $message; 
    echo '</div>';
} 
?>
   
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                ID
            </th>
            <th>
                Graduação
            </th>
            <th>
                Arte Marcial
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($graduacoes != false): ?>
        <?php foreach ($graduacoes as $graduacao): ?>
            <tr>
            <td>
                <?=$graduacao->idGraduacao ?>
            </td>
            <td>
                <?=$graduacao->nomeGraduacao ?>
            </td>
            <td>
                <?=$graduacao->nomeArteMarcial ?>
            </td>
            <td style="text-align: center;">
                <a class="btn btn-success" href="<?=site_url('graduacao/edit/'.$graduacao->idGraduacao) ?>">
                    <i class="fa fa-pencil fa-lg"></i> Editar</a>
                <a class="btn btn-danger" href="<?=site_url('graduacao/delete/'.$graduacao->idGraduacao) ?>"
                   title="Deseja realmente excluir a graduação?" data-toggle="confirmation-delete" data-singleton="true" data-placement="top">
                    <i class="fa fa-trash-o fa-lg" title="Excluir a Graduação"></i> Deletar</a>
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
