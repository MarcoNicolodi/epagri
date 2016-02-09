
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Propriedades</h2>
    </div>
</div>

<div class="panel panel-green">
    <div class="panel-heading">
        <h3 class="panel-title">Gerenciar Propriedades</h3>
    </div>
    <div class="panel-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('tamanho') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th><?= $this->Paginator->sort('endereco') ?></th>
                <th><?= $this->Paginator->sort('cidade_id') ?></th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propriedades as $propriedade): ?>
            <tr>
                <td><?= $this->Number->format($propriedade->id) ?></td>
                <td><?= h($propriedade->nome) ?></td>
                <td><?= $this->Number->format($propriedade->tamanho) ?></td>
                <td><?= $propriedade->has('usuario') ? $this->Html->link($propriedade->usuario->username, ['controller' => 'Usuarios', 'action' => 'view', $propriedade->usuario->id_usuario]) : '' ?></td>
                <td><?= h($propriedade->endereco) ?></td>
                <td><?= $propriedade->has('cidade') ? $this->Html->link($propriedade->cidade->nome, ['controller' => 'Cidades', 'action' => 'view', $propriedade->cidade->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-search fa-white"></i>', ['action' => 'view', $propriedade->id], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Visualizar']) ?>
                    <?= $this->Html->link('<i class="fa fa-pencil fa-white"></i>', ['action' => 'edit', $propriedade->id], ['class' => 'btn btn-primary btn-sm', 'escape' => false, 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink('<i class="fa fa-times fa-white"></i>', ['action' => 'delete', $propriedade->id], ['class' =>'btn btn-danger btn-sm', 'escape' => false, 'title' => 'Excluir', 'confirm' =>'Tem certeza que deseja apagar a propriedade {0}?', $propriedade->nome]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Próximo')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Anterior') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    <?= $this->Html->link(__('Cadastrar'), ['controller' => 'Propriedades', 'action' => 'add'], ['class'=> 'btn btn-lg btn-default']) ?>
    <div>
</div>
</div>
</div>
