<div class="entradaProdutos index large-9 medium-8 columns content">
    <h3><?= __('Entrada Produtos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('qtde') ?></th>
                <th><?= $this->Paginator->sort('data') ?></th>
                <th><?= $this->Paginator->sort('produto_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entradaProdutos as $entradaProduto): ?>
            <tr>
                <td><?= $this->Number->format($entradaProduto->id) ?></td>
                <td><?= $this->Number->format($entradaProduto->qtde) ?></td>
                <td><?= h($entradaProduto->data) ?></td>
                <td><?= $entradaProduto->has('produto') ? $this->Html->link($entradaProduto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $entradaProduto->produto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $entradaProduto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $entradaProduto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $entradaProduto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $entradaProduto->id)]) ?>
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
