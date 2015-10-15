<div class="produtos view large-9 medium-8 columns content">
    <h3><?= h($produto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nome') ?></th>
            <td><?= h($produto->nome) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($produto->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Estoques') ?></h4>
        <?php if (!empty($produto->estoques)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Produto Id') ?></th>
                <th><?= __('Qtde') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($produto->estoques as $estoques): ?>
            <tr>
                <td><?= h($estoques->id) ?></td>
                <td><?= h($estoques->produto_id) ?></td>
                <td><?= h($estoques->qtde) ?></td>
                <td><?= h($estoques->usuario_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Estoques', 'action' => 'view', $estoques->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Estoques', 'action' => 'edit', $estoques->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estoques', 'action' => 'delete', $estoques->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estoques->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
