<div class="ciclos index large-9 medium-8 columns content">
    <h3><?= __('Ciclos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tanque_id') ?></th>
                <th><?= $this->Paginator->sort('data_inicio') ?></th>
                <th><?= $this->Paginator->sort('povoamento_inicio') ?></th>
                <th><?= $this->Paginator->sort('status_id') ?></th>
                <th><?= $this->Paginator->sort('data_fim') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ciclos as $ciclo): ?>
            <tr>
                <td><?= $this->Number->format($ciclo->id) ?></td>
                <td><?= $ciclo->has('tanque') ? $this->Html->link($ciclo->tanque->id, ['controller' => 'Tanques', 'action' => 'view', $ciclo->tanque->id]) : '' ?></td>
                <td><?= h($ciclo->data_inicio) ?></td>
                <td><?= $this->Number->format($ciclo->povoamento_inicio) ?></td>
                <td><?= $ciclo->has('status') ? $this->Html->link($ciclo->status->id, ['controller' => 'Status', 'action' => 'view', $ciclo->status->id]) : '' ?></td>
                <td><?= h($ciclo->data_fim) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ciclo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ciclo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ciclo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ciclo->id)]) ?>
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
