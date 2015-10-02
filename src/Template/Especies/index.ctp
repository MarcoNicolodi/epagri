<div class="especies index large-9 medium-8 columns content">
    <h3><?= __('Especies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('descricao') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($especies as $especie): ?>
            <tr>
                <td><?= $this->Number->format($especie->id) ?></td>
                <td><?= h($especie->nome) ?></td>
                <td><?= h($especie->descricao) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $especie->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $especie->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $especie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $especie->id)]) ?>
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
