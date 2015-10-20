<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Notificacao'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visitas'), ['controller' => 'Visitas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visita'), ['controller' => 'Visitas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="notificacoes index large-9 medium-8 columns content">
    <h3><?= __('Notificacoes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('visita_id') ?></th>
                <th><?= $this->Paginator->sort('alimentacao') ?></th>
                <th><?= $this->Paginator->sort('aeradores') ?></th>
                <th><?= $this->Paginator->sort('alerta_alimentacao') ?></th>
                <th><?= $this->Paginator->sort('alerta_aeradores') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notificacoes as $notificacao): ?>
            <tr>
                <td><?= $this->Number->format($notificacao->id) ?></td>
                <td><?= $notificacao->has('visita') ? $this->Html->link($notificacao->visita->id, ['controller' => 'Visitas', 'action' => 'view', $notificacao->visita->id]) : '' ?></td>
                <td><?= h($notificacao->alimentacao) ?></td>
                <td><?= h($notificacao->aeradores) ?></td>
                <td><?= h($notificacao->alerta_alimentacao) ?></td>
                <td><?= h($notificacao->alerta_aeradores) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $notificacao->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $notificacao->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $notificacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacao->id)]) ?>
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
