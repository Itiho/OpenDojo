<div class="container-fluid">
<h1><?=$cabecalho ?></h1>

<?=anchor('graduacao/add', '<i class="fa fa-plus-circle fa-4x"></i> Adicionar Graduação') ?>

		

<?php if (isset($message)) { 
    echo $message;
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
