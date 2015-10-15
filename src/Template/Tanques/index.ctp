<div class="tanques index large-9 medium-8 columns content">
    <h3><?= __('Tanques') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('cobertura_id') ?></th>
                <th><?= $this->Paginator->sort('capacidade') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('propriedade_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tanques as $tanque): ?>
            <tr>
                <td><?= $this->Number->format($tanque->id) ?></td>
                <td><?= $tanque->has('cobertura') ? $this->Html->link($tanque->cobertura->id, ['controller' => 'Coberturas', 'action' => 'view', $tanque->cobertura->id]) : '' ?></td>
                <td><?= $this->Number->format($tanque->capacidade) ?></td>
                <td><?= h($tanque->nome) ?></td>
                <td><?= $tanque->has('propriedade') ? $this->Html->link($tanque->propriedade->id, ['controller' => 'Propriedades', 'action' => 'view', $tanque->propriedade->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tanque->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tanque->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tanque->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tanque->id)]) ?>
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
