<div class="estoques index large-9 medium-8 columns content">
    <h3><?= __('Estoques') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estoques as $estoque): ?>
            <tr>
                <td><?= $this->Number->format($estoque->id) ?></td>
                <td><?= $estoque->has('produto') ? $this->Html->link($estoque->produto->id, ['controller' => 'Produtos', 'action' => 'view', $estoque->produto->id]) : '' ?></td>
                <td><?= $this->Number->format($estoque->qtde) ?></td>
                <td><?= $estoque->has('usuario') ? $this->Html->link($estoque->usuario->id_usuario, ['controller' => 'Usuarios', 'action' => 'view', $estoque->usuario->id_usuario]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estoque->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estoque->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estoque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estoque->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
