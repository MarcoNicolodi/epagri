
<div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Propriedades</h2>
    </div>
</div>

<div class="panel panel-success">
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
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propriedades as $propriedade): ?>
            <tr>
                <td><?= $this->Number->format($propriedade->id) ?></td>
                <td><?= h($propriedade->nome) ?></td>
                <td><?= $this->Number->format($propriedade->tamanho) ?></td>
                <td><?= $propriedade->has('usuario') ? $this->Html->link($propriedade->usuario->id_usuario, ['controller' => 'Usuarios', 'action' => 'view', $propriedade->usuario->id_usuario]) : '' ?></td>
                <td><?= h($propriedade->endereco) ?></td>
                <td><?= $propriedade->has('cidade') ? $this->Html->link($propriedade->cidade->id, ['controller' => 'Cidades', 'action' => 'view', $propriedade->cidade->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $propriedade->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propriedade->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propriedade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propriedade->id)]) ?>
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
    <div>
</div>
</div>
</div>
