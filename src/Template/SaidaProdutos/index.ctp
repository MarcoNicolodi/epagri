<div class="saidaProdutos index large-9 medium-8 columns content">
    <h3><?= __('Saida Produtos') ?></h3>
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
            <?php foreach ($saidaProdutos as $saidaProduto): ?>
            <tr>
                <td><?= $this->Number->format($saidaProduto->id) ?></td>
                <td><?= $this->Number->format($saidaProduto->qtde) ?></td>
                <td><?= h($saidaProduto->data) ?></td>
                <td><?= $saidaProduto->has('produto') ? $this->Html->link($saidaProduto->produto->id, ['controller' => 'Produtos', 'action' => 'view', $saidaProduto->produto->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $saidaProduto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saidaProduto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saidaProduto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saidaProduto->id)]) ?>
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
