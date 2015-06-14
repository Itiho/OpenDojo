<div class="container-fluid">
<h1><?=$cabecalho ?></h1>

<?=anchor('graduacao/add', '<i class="fa fa-plus-circle fa-4x"></i>') ?>

		

	<p><?=anchor('graduacao/criar', 'Criar Grupo') ?></p>

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
            <td>
                <?=anchor('graduacao/edit/' . $graduacao->idGraduacao, 'Editar') ?> |
                <?=anchor('graduacao/delete/' . $graduacao->idGraduacao, 'Deletar') ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Não há registros cadastrados!</p>
        <?php endif ?>
    </tbody>
</table>



</div>
