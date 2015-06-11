<h1><?=$cabecalho ?></h1>
<div class="container-fluid">
  <div class="row">		

	<p><?=anchor('graduacao/criar', 'Criar Grupo') ?></p>


        
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
                <?=anchor('graduacao/editar/' . $graduacao->idGraduacao, 'Editar') ?> |
                <?=anchor('graduacao/deletar/' . $graduacao->idGraduacao, 'Deletar') ?>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Não há registros cadastrados!</p>
        <?php endif ?>
    </tbody>
</table>


 </div>
</div>
